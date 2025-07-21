<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    'Pfprojects',
    'Pfprojects',
    'PF Projects'
);
