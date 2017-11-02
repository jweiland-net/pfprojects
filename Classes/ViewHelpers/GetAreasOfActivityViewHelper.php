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
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorting array
 */
class GetAreasOfActivityViewHelper extends AbstractViewHelper {

    /**
     * @var \JWeiland\Pfprojects\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var \JWeiland\Pfprojects\Configuration\ExtConf;
     */
    protected $extConf = NULL;

    /**
     * inject category repository
     *
     * @param \JWeiland\Pfprojects\Domain\Repository\CategoryRepository $categoryRepository
     * @return void
     */
    public function injectCategoryRepository(\JWeiland\Pfprojects\Domain\Repository\CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * inject extension configuration
     *
     * @param \JWeiland\Pfprojects\Configuration\ExtConf $extConf
     * @return void
     */
    public function injectExtConf(\JWeiland\Pfprojects\Configuration\ExtConf $extConf) {
        $this->extConf = $extConf;
    }

    /**
     * get direct child categories of defined root category in extConf
     *
     * @param array $areasOfActivity
     * @return array
     */
    public function render(array $areasOfActivity = array()) {
        $rootCategory = (int)$this->extConf->getRootCategory();
        $categories = array();
        // make sure to have only categories which are direct children of rootCategory
        if ($areasOfActivity !== array()) {
            /** @var \TYPO3\CMS\Extbase\Domain\Model\Category $areaOfActivity */
            foreach ($areasOfActivity as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory instanceof Category && $parentCategory->getUid() === $rootCategory) {
                    $categories[] = $areaOfActivity;
                }
            }
        } else {
            /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $categoryResult */
            $categoryResult = $this->categoryRepository->findByParent($rootCategory);
            // we need an Array as collection for usort and not an ObjectStorage
            $categories = $categoryResult->toArray();
        }
        usort($categories, array('self', 'sortCategoriesByTitle'));
        return $categories;
    }

    /**
     * sort categories
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryA
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryB
     * @return int
     */
    protected function sortCategoriesByTitle($categoryA, $categoryB) {
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
