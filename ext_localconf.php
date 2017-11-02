<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JWeiland.' . $_EXTKEY,
	'Pfprojects',
	array(
		'Project' => 'list, show',
		'Location' => 'show'
	),
	// non-cacheable actions
	array(
		'Project' => '',
	)
);
