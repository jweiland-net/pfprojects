<?php
namespace JWeiland\Pfprojects\ViewHelpers;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Stefan Froemken <projects@jweiland.net>, www.jweiland.net
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
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorting array
 */
class GetTargetsViewHelper extends AbstractViewHelper {

    /**
     * get direct child categories of defined root category in extConf
     *
     * @param integer $parent
     * @param array $areasOfActivity
     * @return array
     */
    public function render($parent, array $areasOfActivity = array()) {
        $categories = array();
        if (count($areasOfActivity)) {
            /** @var \TYPO3\CMS\Extbase\Domain\Model\Category $areaOfActivity */
            foreach ($areasOfActivity as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory !== NULL && $parentCategory->getUid() === $parent) {
                    $categories[] = $areaOfActivity;
                }
            }
        }
        usort($categories, array('self', 'sortTargetsByTitle'));
        return $categories;
    }

    /**
     * sort categories
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryA
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryB
     * @return int
     */
    protected function sortTargetsByTitle($categoryA, $categoryB) {
        if ($categoryA->getTitle() == $categoryB->getTitle()) {
            return 0;
        }
        if ($categoryA->getTitle() > $categoryB->getTitle()) {
            return 1;
        } else {
            return -1;
        }
    }

}