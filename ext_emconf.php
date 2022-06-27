<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'PF Projects',
    'description' => 'This extension shows a list of projects and can be connected with service_bw2.',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '5.0.5',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.6-10.4.99',
            'maps2' => '9.2.0-0.0.0',
            'service_bw2' => '4.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
