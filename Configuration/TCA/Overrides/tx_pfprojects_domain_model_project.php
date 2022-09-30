<?php
call_user_func(static function (): void {
    $extConf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \JWeiland\Pfprojects\Configuration\ExtConf::class
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
        'pfprojects',
        'tx_pfprojects_domain_model_project',
        'area_of_activity',
        [
            'label' => 'LLL:EXT:pfprojects/Resources/Private/Language/locallang_db.xlf:tx_pfprojects_domain_model_project.area_of_activity',
            'fieldConfiguration' => [
                'treeConfig' => [
                    'rootUid' => $extConf->getRootCategory()
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
});
