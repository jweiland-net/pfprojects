<?php declare(strict_types=1);
namespace JWeiland\Pfprojects\ViewHelpers;

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

use JWeiland\Pfprojects\Configuration\ExtConf;
use JWeiland\Pfprojects\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorting array
 */
class GetAreasOfActivityViewHelper extends AbstractViewHelper
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ExtConf;
     */
    protected $extConf;

    /**
     * inject category repository
     *
     * @param CategoryRepository $categoryRepository
     * @return void
     */
    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * inject extension configuration
     *
     * @param ExtConf $extConf
     * @return void
     */
    public function injectExtConf(ExtConf $extConf)
    {
        $this->extConf = $extConf;
    }

    /**
     * get direct child categories of defined root category in extConf
     *
     * @param ObjectStorage $areasOfActivity
     * @return array
     */
    public function render(ObjectStorage $areasOfActivity = null):array
    {
        $rootCategory = $this->extConf->getRootCategory();
        $categories = [];
        // make sure to have only categories which are direct children of rootCategory
        if ($areasOfActivity !== null) {
            /** @var Category $areaOfActivity */
            foreach ($areasOfActivity as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory instanceof Category && $parentCategory->getUid() === $rootCategory) {
                    $categories[] = $areaOfActivity;
                }
            }
        } else {
            /** @var QueryResult $categoryResult */
            $categoryResult = $this->categoryRepository->findByParent($rootCategory);
            // we need an Array as collection for usort and not an ObjectStorage
            $categories = $categoryResult->toArray();
        }
        usort($categories, ['self', 'sortCategoriesByTitle']);
        return $categories;
    }

    /**
     * sort categories
     *
     * @param Category $categoryA
     * @param Category $categoryB
     * @return int
     */
    protected function sortCategoriesByTitle(Category $categoryA, Category $categoryB): int
    {
        if ($categoryA->getTitle() === $categoryB->getTitle()) {
            return 0;
        }
        if ($categoryA->getTitle() > $categoryB->getTitle()) {
            return 1;
        }
        return -1;
    }
}
