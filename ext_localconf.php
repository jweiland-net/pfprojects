<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

use JWeiland\Pfprojects\Controller\ProjectController;
use JWeiland\Pfprojects\Updates\SlugUpdateWizard;

call_user_func(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Pfprojects',
        'Pfprojects',
        [
            ProjectController::class => 'list, search, show',
        ],
        // non-cacheable actions
        [
            ProjectController::class => 'search',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['pfProjectUpdateSlug']
        = SlugUpdateWizard::class;
});
