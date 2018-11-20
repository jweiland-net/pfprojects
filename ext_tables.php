<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_pfprojects_domain_model_project',
    'EXT:pfprojects/Resources/Private/Language/locallang_csh_tx_pfprojects_domain_model_project.xlf'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pfprojects_domain_model_project');
