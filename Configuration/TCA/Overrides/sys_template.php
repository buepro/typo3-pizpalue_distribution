<?php

defined('TYPO3_MODE') || die();

(function ($_EXTKEY) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $_EXTKEY,
        'Configuration/TypoScript',
        'Pizpalue distribution'
    );
})('pizpalue_distribution');
