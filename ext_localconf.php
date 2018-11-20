<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'JWeiland.pfprojects',
    'Pfprojects',
    [
        'Project' => 'list, show',
        'Location' => 'show'
    ],
    // non-cacheable actions
    [
        'Project' => '',
    ]
);
