<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Pfprojects',
        'Pfprojects',
        [
            \JWeiland\Pfprojects\Controller\ProjectController::class => 'list, search, show',
        ],
        // non-cacheable actions
        [
            \JWeiland\Pfprojects\Controller\ProjectController::class => 'search',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['pfProjectUpdateSlug']
        = \JWeiland\Pfprojects\Updates\SlugUpdateWizard::class;

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
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
