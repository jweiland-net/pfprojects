<?php

call_user_func(static function (): void {
    $extConf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \JWeiland\Pfprojects\Configuration\ExtConf::class
    );

    $typo3Version = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class);
    if (version_compare($typo3Version->getBranch(), '11.4', '>')) {
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
