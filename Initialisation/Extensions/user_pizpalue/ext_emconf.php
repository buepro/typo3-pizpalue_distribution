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
    'version' => '4.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-99.99.99',
            'pizpalue' => '14.0.0-99.99.99',
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
