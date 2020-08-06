<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$tempColumns = [
    'icon' => [
        'exclude' => true,
        'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:sys_category.icon',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'icon',
            [
                'maxitems' => 1,
                'minitems' => 0,
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        )
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_category', $tempColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('sys_category', 'icon', '1', 'after:description');
unset($tempColumns);
