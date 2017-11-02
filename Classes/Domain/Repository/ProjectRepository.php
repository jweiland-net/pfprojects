<?php
namespace JWeiland\Pfprojects\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Stefan Froemken <projects@jweiland.net>, jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @package pfproject
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class ProjectRepository extends Repository {

    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'status' => QueryInterface::ORDER_ASCENDING
    );

    /**
     * find all records sorted by given parameters
     *
     * @param int $areaOfActivity
     * @param string $sortBy
     * @param string $direction
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllSorted($areaOfActivity, $sortBy, $direction) {
        $query = $this->createQuery();

        $constraint = array();
        if ($areaOfActivity) {
            $constraint[] = $query->contains('areaOfActivity', $areaOfActivity);
        }
        if (GeneralUtility::inList('title,status,start_date,area_of_activity', $sortBy) && GeneralUtility::inList('ASC,DESC', strtoupper($direction))) {
            $query->setOrderings(array(
                $sortBy => strtoupper($direction)
            ));
        }
        if (empty($constraint)) {
            return $query->execute();
        } else {
            return $query->matching($query->logicalAnd($constraint))->execute();
        }
    }
}