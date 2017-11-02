<?php
$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pfprojects']);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'pfprojects',
    'tx_pfprojects_domain_model_project',
    'area_of_activity',
    [
        'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.area_of_activity',
        'fieldConfiguration' => [
            'treeConfig' => [
                'rootUid' => $extConf['rootCategory']
            ]
        ]
    ]
);
