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

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * With this VH you get all direct child categories of a given parent category.
 * All available categories have to be send via $areasOfActivity, so no Repo is needed.
 */
class GetTargetsViewHelper extends AbstractViewHelper
{
    /**
     * get direct child categories of defined root category in extConf
     *
     * @param int $parent
     * @param ObjectStorage $areasOfActivity
     * @return array
     */
    public function render(int $parent, ObjectStorage $areasOfActivity = null): array
    {
        $categories = [];
        if ($areasOfActivity !== null) {
            /** @var Category $areaOfActivity */
            foreach ($areasOfActivity as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory !== null && $parentCategory->getUid() === $parent) {
                    $categories[] = $areaOfActivity;
                }
            }
        }
        usort($categories, ['self', 'sortTargetsByTitle']);
        return $categories;
    }

    /**
     * sort categories
     *
     * @param Category $categoryA
     * @param Category $categoryB
     * @return int
     */
    protected function sortTargetsByTitle(Category $categoryA, Category $categoryB): int
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
