<?php

/*
 * This file is part of the composer package buepro/typo3-pizpalue-distribution.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Pizpalue distribution',
    'description'      => 'This distribution provides a sample website using bootstrap and the extensions pizpalue and container_elements. The distribution tailors Swiss market featuring German as default language and additional translations to French, English and Finnish.',
    'category'         => 'distribution',
    'version'          => '3.3.1-dev',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'container_elements'    => '3.0.0-3.99.99',
            'easyconf'              => '1.0.1-1.99.99',
            'eventnews'             => '5.0.0',
            'news'                  => '9.4.0-9.99.99',
            'php'                   => '7.4.0-8.0.99',
            'pizpalue'              => '12.5.0-12.5.99',
            'timelog'               => '1.7.0-1.99.99',
            'tt_address'            => '6.0.1-6.99.99',
            'typo3'                 => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Buepro\\PizpalueDistribution\\' => 'Classes'
        ],
    ],
];
