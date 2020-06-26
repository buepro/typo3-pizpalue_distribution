<?php

/*
 * This file is part of the package buepro/pizpalue_distribution.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();

(function () {
    /**
     * After extension installation handler
     */
    $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
    $signalSlotDispatcher->connect(
        \TYPO3\CMS\Extensionmanager\Utility\InstallUtility::class,
        'afterExtensionInstall',
        \Buepro\PizpalueDistribution\Slot\ExtensionInstallUtility::class,
        'afterExtensionInstall'
    );
})();
