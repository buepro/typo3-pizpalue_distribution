<?php

/*
 * This file is part of the package buepro/pizpalue_distribution.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();

(function ($_EXTKEY) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $_EXTKEY,
        'Configuration/TypoScript',
        'Pizpalue distribution'
    );
})('pizpalue_distribution');
