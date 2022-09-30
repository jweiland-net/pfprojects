<?php

call_user_func(static function (): void {
    $extConf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \JWeiland\Pfprojects\Configuration\ExtConf::class
    );

    if (version_compare(\JWeiland\Avalex\Utility\Typo3Utility::getTypo3Version(), '11.4', '>')) {
        unset($GLOBALS['TCA']['tx_pfprojects_domain_model_project']['columns']['area_of_activity']['config']['treeConfig']['rootUid']);
        $GLOBALS['TCA']['tx_pfprojects_domain_model_project']['columns']['area_of_activity']['config']['treeConfig']['startingPoints']
            = $extConf->getRootCategory();
    } else {
        $GLOBALS['TCA']['tx_pfprojects_domain_model_project']['columns']['area_of_activity']['config']['treeConfig']['rootUid']
            = $extConf->getRootCategory();
    }

    // Add tx_maps2_uid column to projects table
    if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('maps2')) {
        \JWeiland\Maps2\Tca\Maps2Registry::getInstance()->add(
            'pfprojects',
            'tx_pfprojects_domain_model_project'
        );
    }
});
