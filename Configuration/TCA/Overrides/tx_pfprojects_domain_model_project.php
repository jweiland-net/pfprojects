<?php
call_user_func(function ($extConf) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
        'pfprojects',
        'tx_pfprojects_domain_model_project',
        'area_of_activity',
        [
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.area_of_activity',
            'fieldConfiguration' => [
                'treeConfig' => [
                    'rootUid' => (int)$extConf['rootCategory']
                ]
            ]
        ]
    );

    // Add tx_maps2_uid column to projects table
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
        $result = \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
            'pfprojects',
            'tx_pfprojects_domain_model_project'
        );
    }
}, unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['pfprojects']));
