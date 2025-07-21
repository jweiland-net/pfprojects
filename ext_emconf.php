<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'PF Projects',
    'description' => 'This extension shows a list of projects and can be connected with service_bw2.',
    'category' => 'plugin',
    'author' => 'Stefan Froemken, Hoja Mustaffa Abdul Latheef',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '7.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
            'maps2' => '11.0.0-0.0.0',
            'service_bw2' => '7.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
