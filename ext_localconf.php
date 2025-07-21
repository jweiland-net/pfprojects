<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

use JWeiland\Pfprojects\Controller\ProjectController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
        = \JWeiland\Pfprojects\Updates\SlugUpdateWizard::class;

    // ToDo: Migrate to Icons.php while removing TYPO3 10 compatibility
    $iconRegistry = GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    $iconRegistry->registerIcon(
        'ext-pfprojects-wizard-icon',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:pfprojects/Resources/Public/Icons/Extension.svg']
    );

    // Add pfprojects plugin to new element wizard
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:pfprojects/Configuration/TSconfig/ContentElementWizard.tsconfig">'
    );
});
