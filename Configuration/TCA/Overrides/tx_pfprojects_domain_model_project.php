<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Maps2\Tca\Maps2Registry;
use JWeiland\Pfprojects\Configuration\ExtConf;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

call_user_func(static function (): void {
    $extConf = GeneralUtility::makeInstance(
        ExtConf::class,
    );
    unset($GLOBALS['TCA']['tx_pfprojects_domain_model_project']['columns']['area_of_activity']['config']['treeConfig']['rootUid']);
    $GLOBALS['TCA']['tx_pfprojects_domain_model_project']['columns']['area_of_activity']['config']['treeConfig']['startingPoints']
        = $extConf->getRootCategory();

    // Add tx_maps2_uid column to projects table
    if (ExtensionManagementUtility::isLoaded('maps2')) {
        Maps2Registry::getInstance()->add(
            'pfprojects',
            'tx_pfprojects_domain_model_project',
        );
    }
});
