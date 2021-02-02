<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Pfprojects',
    'Pfprojects',
    [
        \JWeiland\Pfprojects\Controller\ProjectController::class => 'list, search, show'
    ],
    // non-cacheable actions
    [
        \JWeiland\Pfprojects\Controller\ProjectController::class => 'search'
    ]
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['pfProjectsCategoryIcon']
    = \JWeiland\Pfprojects\Updates\CategoryIconUpdateWizard::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['pfProjectUpdateSlug']
    = \JWeiland\Pfprojects\Updates\SlugUpdateWizard::class;
