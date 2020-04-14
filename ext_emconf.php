<?php



$EM_CONF[$_EXTKEY] = [
    'title'            => 'Pizpalue distribution',
    'description'      => 'This distribution provides a sample website using bootstrap and the extensions pizpalue and pp_gridelements. The distribution tailors Swiss market featuring German as default language and additional translations to French, English and Finnish.',
    'category'         => 'distribution',
    'version'          => '1.0.0',
    'state'            => 'stable',
    'clearCacheOnLoad' => 1,
    'author'           => 'Roman Büchler',
    'author_email'     => 'rb@buechler.pro',
    'constraints'      => [
        'depends'   => [
            'typo3'                 => '9.5.7-9.5.99',
            'pizpalue'              => '11.0.2-11.99.99',
            'pp_gridelements'       => '1.0.0-1.99.99',
            'slickcarousel'         => '3.0.3-3.99.99',
            'ws_flexslider'         => '1.5.12-1.99.99',
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
