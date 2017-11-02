<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'PF Projects',
    'description' => 'This extension shows a list of all masterplan projects of Pforzheim',
    'category' => 'plugin',
    'author' => 'Stefan Froemken',
    'author_email' => 'projects@jweiland.net',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '1',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'maps2' => '2.9.0-2.9.99',
            'service_bw2' => '0.0.1' /* @todo update as soon as first stable version was released */
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
