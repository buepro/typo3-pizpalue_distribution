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
    'version'          => '3.0.0-dev',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'container_elements'    => '2.0.0-2.99.99',
            'pizpalue'              => '12.0.0-12.99.99',
            'timelog'               => '1.6.0-1.99.99',
            'tt_address'            => '5.2.1-8.99.99',
            'news'                  => '8.5.2-8.99.99',
            'typo3'                 => '11.3.0-11.99.99',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Buepro\\PizpalueDistribution\\' => 'Classes'
        ],
    ],
];
