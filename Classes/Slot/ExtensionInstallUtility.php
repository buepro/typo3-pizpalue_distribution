<?php
declare(strict_types = 1);

/*
 * This file is part of the package buepro/pizpalue_distribution.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Buepro\PizpalueDistribution\Slot;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Utility\InstallUtility;

class ExtensionInstallUtility
{

    /**
     * Installs the extension user_pizpalue. In case it isn't available under typo3conf/ext it will be copied from
     * the folder EXT:pizpalue_distribution/Initialisation/Extensions/
     *
     * @return bool true if extension user_pizpalue could be installed
     * @throws \TYPO3\CMS\Extensionmanager\Exception\ExtensionManagerException
     */
    private function installUserExtension()
    {
        $source = Environment::getPublicPath() . '/typo3conf/ext/pizpalue_distribution/Initialisation/Extensions/user_pizpalue';
        $destination = Environment::getPublicPath() . '/typo3conf/ext/user_pizpalue';
        if (!file_exists($source)) {
            return false;
        }
        if (!file_exists($destination)) {
            GeneralUtility::copyDirectory($source, $destination);
            if (!file_exists($destination)) {
                return false;
            }
        }
        $installUtility = GeneralUtility::makeInstance(InstallUtility::class);
        if (!$installUtility->isLoaded('user_pizpalue')) {
            $installUtility->reloadAvailableExtensions();
            $installUtility->install('user_pizpalue');
        }
        return $installUtility->isLoaded('user_pizpalue');
    }

    /**
     * Handles the installation from the extension user_pizpalue as well as the copying from a default
     * site configuration.
     *
     * @param $extensionKey
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     * @throws \TYPO3\CMS\Extensionmanager\Exception\ExtensionManagerException
     */
    public function afterExtensionInstall($extensionKey)
    {
        if ($extensionKey !== 'pizpalue_distribution') {
            return;
        }
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        if ($extensionConfiguration->get('pizpalue_distribution', 'installUserExtension')) {
            $this->installUserExtension();
        }
    }
}
