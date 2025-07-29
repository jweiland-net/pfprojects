<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Domain\Repository;

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
        'status' => QueryInterface::ORDER_ASCENDING,
    ];

    public function findAllSorted(int $areaOfActivity, string $sortBy, string $direction): QueryResultInterface
    {
        $query = $this->createQuery();

        $constraint = [];
        if ($areaOfActivity !== 0) {
            $constraint[] = $query->contains('areaOfActivity', $areaOfActivity);
        }

        if (
            GeneralUtility::inList('title,status,start_date,area_of_activity', $sortBy) &&
            GeneralUtility::inList('ASC,DESC', strtoupper($direction))
        ) {
            $query->setOrderings([
                $sortBy => strtoupper($direction),
            ]);
        }

        if ($constraint === []) {
            return $query->execute();
        }

        return $query->matching($query->logicalAnd(...$constraint))->execute();
    }
}
