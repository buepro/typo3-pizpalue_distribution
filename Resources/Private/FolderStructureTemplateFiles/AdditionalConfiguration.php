<?php

/*
 * This file is part of the composer package buepro/typo3-pizpalue-distribution.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'] = 'd.m.Y';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['hhmm'] = 'H:i';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['phpTimeZone'] = 'Europe/Zurich';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_CH.utf8';
$GLOBALS['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

/**
 * Disables logging in production context
 */
if (\TYPO3\CMS\Core\Core\Environment::getContext()->isProduction()) {
    // Removes the default writer configurations
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['writerConfiguration'] = [];
    // Removes the writer configuration for depreciation log
    $GLOBALS['TYPO3_CONF_VARS']['LOG']['TYPO3']['CMS']['deprecations']['writerConfiguration'][\TYPO3\CMS\Core\Log\LogLevel::NOTICE] = [];
}
