<?php declare(strict_types=1);
namespace JWeiland\Pfprojects\ViewHelpers;

/*
 * This file is part of the service_bw2 project.
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
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * A ViewHelper to get a sorting array
 */
class GetTargetsViewHelper extends AbstractViewHelper {

    /**
     * get direct child categories of defined root category in extConf
     *
     * @param int $parent
     * @param array $areasOfActivity
     * @return array
     */
    public function render(int $parent, array $areasOfActivity = []): array
    {
        $categories = [];
        if (count($areasOfActivity)) {
            /** @var Category $areaOfActivity */
            foreach ($areasOfActivity as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if ($parentCategory !== NULL && $parentCategory->getUid() === $parent) {
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
