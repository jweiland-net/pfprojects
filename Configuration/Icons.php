<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'ext-pfprojects-wizard-icon' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:pforum/Resources/Public/Icons/Extension.svg',
    ],
];
