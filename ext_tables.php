<?php
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'JWeiland.pfprojects',
    'Pfprojects',
    'PF Projects'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'pfprojects',
    'Configuration/TypoScript',
    'PF Projects'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_pfprojects_domain_model_project',
    'EXT:pfprojects/Resources/Private/Language/locallang_csh_tx_pfprojects_domain_model_project.xlf'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pfprojects_domain_model_project');
