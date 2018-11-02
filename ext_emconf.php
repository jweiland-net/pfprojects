<?php

$EM_CONF['pfprojects'] = [
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
    'version' => '2.2.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'maps2' => '4.1.0-4.99.99',
            'service_bw2' => '1.4.0-1.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
