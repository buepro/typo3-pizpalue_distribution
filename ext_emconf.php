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
    'version'          => '7.0.1',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'container_elements'    => '5.1.0-5.99.99',
            'easyconf'              => '2.1.0-2.99.99',
            'news'                  => '11.1.0-11.99.99',
            'pizpalue'              => '16.0.0-16.99.99',
            'tt_address'            => '8.0.1-8.99.99',
            'typo3'                 => '12.4.0-12.99.99',
        ],
        'conflicts' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Buepro\\PizpalueDistribution\\' => 'Classes'
        ],
    ],
];
