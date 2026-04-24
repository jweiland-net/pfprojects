<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use JWeiland\Pfprojects\Domain\Model\Category;
use JWeiland\Pfprojects\Domain\Model\Project;

return [
    Category::class => [
        'tableName' => 'sys_category',
    ],
    Project::class => [
        'properties' => [
            'office' => [
                'fieldName' => 'office_manuell',
            ],
        ],
    ],
];
