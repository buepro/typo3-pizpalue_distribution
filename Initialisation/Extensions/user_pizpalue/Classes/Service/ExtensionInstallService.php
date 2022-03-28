<?php
declare(strict_types=1);

/*
 * This file is part of the package buepro/user_pizpalue.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Buepro\UserPizpalue\Service;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extensionmanager\Event\AfterExtensionFilesHaveBeenImportedEvent;

class ExtensionInstallService
{
    public function __invoke(AfterExtensionFilesHaveBeenImportedEvent $event): void
    {
        $this->afterExtensionInstall($event->getPackageKey());
    }

    /**
     * Handles copying the default file AdditionalConfiguration.php.
     *
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException
     * @throws \TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException
     */
    public function afterExtensionInstall(string $extensionKey): void
    {
        if ('user_pizpalue' !== $extensionKey) {
            return;
        }

        // Add default `AdditionalConfiguration.php`
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
        if ((bool)$extensionConfiguration->get('user_pizpalue', 'addAdditionalConfiguration')) {
            $force = (bool) $extensionConfiguration->get('user_pizpalue', 'forceAdditionalConfiguration');
            $this->copyAdditionalConfiguration($force);
        }
    }

    /**
     * Copies the default AdditionalConfiguration file. If forced to copy the previous file is copied to
     * `AdditionalConfiguration_[timeStamp].backup`
     *
     * @param bool $force
     * @return bool returns true if the default file has been copied
     */
    private function copyAdditionalConfiguration($force = false): bool
    {
        $source = Environment::getPublicPath()
            . '/typo3conf/ext/user_pizpalue/Resources/Private/ComposerRoot/public/typo3conf/AdditionalConfiguration.php';
        $destination = Environment::getPublicPath() . '/typo3conf/AdditionalConfiguration.php';
        $backup = sprintf(
            '%s_%d.backup',
            Environment::getPublicPath() . '/typo3conf/AdditionalConfiguration',
            time()
        );
        // There is nothing to copy...
        if (!file_exists($source)) {
            return false;
        }
        // File already exists and we aren't allowed to overwrite it
        if (!$force && file_exists($destination)) {
            return false;
        }
        // Copy, but backup if file already exists
        if (file_exists($destination)) {
            GeneralUtility::upload_copy_move($destination, $backup);
        }
        GeneralUtility::upload_copy_move($source, $destination);
        // Notify
        if (!Environment::isCli()) {
            $message = GeneralUtility::makeInstance(
                FlashMessage::class,
                $GLOBALS['LANG']->sL('LLL:EXT:user_pizpalue/Resources/Private/Language/Backend.xlf:ext_conf.additionalConfigurationChanged'),
                '',
                FlashMessage::NOTICE,
                true
            );
            $flashMessageService = GeneralUtility::makeInstance(FlashMessageService::class);
            $messageQueue = $flashMessageService->getMessageQueueByIdentifier('extbase.flashmessages.tx_extensionmanager_tools_extensionmanagerextensionmanager');
            /** @extensionScannerIgnoreLine */
            $messageQueue->addMessage($message);
        }
        // @todo Confirm copying went correctly
        return true;
    }
}
