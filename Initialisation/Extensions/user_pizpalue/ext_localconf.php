<?php

/*
 * This file is part of the package buepro/user_pizpalue.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') || die('Access denied.');

/**
 * To easier locate code the closure defines it in the following order:
 *   - Generally available items (extension configuration, icon registry)
 *   - Extension `user_pizpalue` related items (TSConfig, TS)
 *   - 3rd party extension related items (form, news)
 *   - Events, hooks
 *
 * Uncomment the code as needed.
 */
(static function () {
    /**
     * Extension configuration
     */
//    $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
//        \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
//    );
//    $userPizpalueConfiguration = $extensionConfiguration->get('user_pizpalue');

    /**
     * Register icons
     */
//    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

    /**
     * Page TSconfig
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '@import "EXT:user_pizpalue/Configuration/TsConfig/Page/*.tsconfig"'
    );

    /**
     * User TSconfig
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        '@import "EXT:user_pizpalue/Configuration/TsConfig/User/*.tsconfig"'
    );
    if ((int)$GLOBALS['TYPO3_CONF_VARS']['BE']['debug'] === 1) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
            '@import "EXT:user_pizpalue/Configuration/TsConfig/Debug/User.tsconfig"'
        );
    }

    /**
     * Adjust RTE
     */
//    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['user_pizpalue'] = 'EXT:user_pizpalue/Configuration/RTE/Default.yaml';
//    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('RTE.default.preset = user_pizpalue');

    /**
     * EXT:form
     */
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('form')) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            '@import "EXT:user_pizpalue/Configuration/Form/Setup.typoscript"'
        );
    }
})();
