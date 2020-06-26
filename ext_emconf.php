<?php

/*
 * This file is part of the package buepro/pizpalue_distribution.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

$EM_CONF[$_EXTKEY] = [
    'title'            => 'Pizpalue distribution',
    'description'      => 'This distribution provides a sample website using bootstrap and the extensions pizpalue and pp_gridelements. The distribution tailors Swiss market featuring German as default language and additional translations to French, English and Finnish.',
    'category'         => 'distribution',
    'version'          => '1.0.0-dev',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'typo3'                 => '10.4.0-10.4.99',
            'pizpalue'              => '11.2.0-11.99.99',
            'pp_gridelements'       => '1.1.0-1.99.99',
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Buepro\\PizpalueDistribution\\' => 'Classes'
        ],
    ],
];
