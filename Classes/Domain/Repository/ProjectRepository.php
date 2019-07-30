<?php
declare(strict_types=1);
namespace JWeiland\Pfprojects\Domain\Repository;

/*
 * This file is part of the pfprojects project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Main repository to retrieve project records.
 */
class ProjectRepository extends Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'status' => QueryInterface::ORDER_ASCENDING
    ];

    /**
     * Find all records sorted by given parameters
     *
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     * @return QueryResultInterface
     */
    public function findAllSorted(int $areaOfActivity, string $sortBy, string $direction): QueryResultInterface
    {
        $query = $this->createQuery();

        $constraint = [];
        if ($areaOfActivity) {
            $constraint[] = $query->contains('areaOfActivity', $areaOfActivity);
        }
        if (
            GeneralUtility::inList('title,status,start_date,area_of_activity', $sortBy) &&
            GeneralUtility::inList('ASC,DESC', strtoupper($direction))
        ) {
            $query->setOrderings([
                $sortBy => strtoupper($direction)
            ]);
        }
        if (empty($constraint)) {
            return $query->execute();
        }
        return $query->matching($query->logicalAnd($constraint))->execute();
    }
}
