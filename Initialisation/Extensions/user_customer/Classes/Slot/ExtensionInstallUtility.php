<?php

/*
 * This file is part of the package buepro/user_customer.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Buepro\UserCustomer\Slot;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\VersionNumberUtility;

class ExtensionInstallUtility
{
    /**
     * Copies the default site configuration delivered with the extension to the site configuration directory.
     * Just copies the default site configuration in case no site configuration exists.
     *
     * @return bool true if default site config could be copied
     * @todo Can be removed when using at least TYPO3 10
     */
    private function copyDefaultSiteConfig()
    {
        $source = Environment::getPublicPath() . '/typo3conf/ext/user_customer/Initialisation/Site/default';
        $destination = Environment::getPublicPath() . '/typo3conf/sites/default';
        if (!file_exists($source)) {
            return false;
        }
        if (!file_exists($destination)) {
            GeneralUtility::copyDirectory($source, $destination);
            if (file_exists($destination)) {
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Copies the default AdditionalConfiguration file
     *
     * @return bool returns true if the default file has been copied
     */
    private function copyAdditionalConfiguration()
    {
        $source = Environment::getPublicPath()
            . '/typo3conf/ext/user_customer/Resources/Private/FolderStructureTemplateFiles/AdditionalConfiguration.php';
        $destination = Environment::getPublicPath() . '/typo3conf/AdditionalConfiguration.php';
        if (!file_exists($source)) {
            return false;
        }
        if (!file_exists($destination)) {
            return GeneralUtility::upload_copy_move($source, $destination);
        }
        return false;
    }

    /**
     * Handles copying the default file AdditionalConfiguration.php
     *
     * @param $extensionKey
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    public function afterExtensionInstall($extensionKey)
    {
        if ($extensionKey !== 'user_customer') {
            return;
        }
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        // Add default site configuration
        if (VersionNumberUtility::convertVersionNumberToInteger(VersionNumberUtility::getCurrentTypo3Version()) < 10000000) {
            if ($extensionConfiguration->get('user_customer', 'addSiteConfiguration')) {
                $this->copyDefaultSiteConfig();
            }
        }
        // Add default `AdditionalConfiguration.php`
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        if ($extensionConfiguration->get('user_customer', 'addAdditionalConfiguration')) {
            $this->copyAdditionalConfiguration();
        }
    }
}
