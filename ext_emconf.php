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
    'version' => '3.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5..99',
            'maps2' => '8.0.0-0.0.0',
            'service_bw2' => '3.0.0-3.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
