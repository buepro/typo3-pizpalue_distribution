<?php

/*
 * This file is part of the package buepro/user_pizpalue.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Buepro\UserPizpalue\Slot;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ExtensionInstallUtility
{
    /**
     * Copies the default AdditionalConfiguration file
     *
     * @return bool returns true if the default file has been copied
     */
    private function copyAdditionalConfiguration()
    {
        $source = Environment::getPublicPath()
            . '/typo3conf/ext/user_pizpalue/Resources/Private/FolderStructureTemplateFiles/AdditionalConfiguration.php';
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
        if ($extensionKey !== 'user_pizpalue') {
            return;
        }

        // Add default `AdditionalConfiguration.php`
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        if ($extensionConfiguration->get('user_pizpalue', 'addAdditionalConfiguration')) {
            $this->copyAdditionalConfiguration();
        }
    }
}
