<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

if (!defined('TYPO3')) {
    die('Access denied.');
}

use JWeiland\Pfprojects\Controller\ProjectController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

call_user_func(static function (): void {
    ExtensionUtility::configurePlugin(
        'Pfprojects',
        'Pfprojects',
        [
            ProjectController::class => 'list, search, show',
        ],
        // non-cacheable actions
        [
            ProjectController::class => 'search',
        ],
    );
});
