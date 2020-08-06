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

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['pfProjectsCategoryIcon']
    = \JWeiland\Pfprojects\Updates\CategoryIconUpdateWizard::class;
