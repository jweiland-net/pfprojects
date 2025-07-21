<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\ViewHelpers;

use JWeiland\Pfprojects\Configuration\ExtConf;
use JWeiland\Pfprojects\Domain\Model\Category;
use JWeiland\Pfprojects\Domain\Repository\CategoryRepository;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * With this VH you get all direct child categories of a given parent category.
 * Seems to be the same as GetTargetsViewHelper:
 * Additionally this VH can retrieve child categories directly from CategoryRepository
 */
class GetAreasOfActivityViewHelper extends AbstractViewHelper
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ExtConf
     */
    protected $extConf;

    public function __construct(CategoryRepository $categoryRepository, ExtConf $extConf)
    {
        $this->categoryRepository = $categoryRepository;
        $this->extConf = $extConf;
    }

    public function initializeArguments(): void
    {
        $this->registerArgument(
            'areasOfActivity',
            'array',
            'Predefined list of available categories to filter for',
            false,
            [],
        );
    }

    /**
     * Get direct child categories of defined root category in extConf
     */
    public function render(): array
    {
        $rootCategory = $this->extConf->getRootCategory();
        $categories = [];
        // make sure to have only categories which are direct children of rootCategory
        if (!empty($this->arguments['areasOfActivity'])) {
            /** @var Category $areaOfActivity */
            foreach ($this->arguments['areasOfActivity'] as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory instanceof Category && $parentCategory->getUid() === $rootCategory) {
                    $categories[] = $areaOfActivity;
                }
            }
        } else {
            $categoryResult = $this->categoryRepository->findByParent($rootCategory);
            // we need an Array as collection for usort and not an ObjectStorage
            $categories = $categoryResult->toArray();
        }

        usort($categories, ['self', 'sortCategoriesByTitle']);

        return $categories;
    }

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
