<?php

/*
 * This file is part of the package buepro/user_pizpalue.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title' => 'Pizpalue site package',
    'description' => 'Site package being used with template pizpalue.',
    'category' => 'templates',
    'author' => 'Roman Büchler',
    'author_email' => 'rb@buechler.pro',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '6.0.0',
    'constraints' => [
        'depends' => [
            'container_elements' => '5.0.0-5.99.99',
            'easyconf' => '2.0.0-2.99.99',
            'news' => '11.0.0-11.99.99',
            'pizpalue' => '16.0.0-99.99.99',
            'pizpalue_distribution' => '7.0.0-7.99.99',
            'tt_address' => '8.0.1-8.99.99',
            'typo3' => '12.4.0-12.99.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Buepro\\UserPizpalue\\' => 'Classes'
        ],
    ],
];
