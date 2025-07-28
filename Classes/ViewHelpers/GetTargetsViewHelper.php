<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\ViewHelpers;

use JWeiland\Pfprojects\Domain\Model\Category;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * With this VH you get all direct child categories of a given parent category.
 * All available categories have to be send via $areasOfActivity, so no Repo is needed.
 */
class GetTargetsViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        $this->registerArgument(
            'parent',
            'int',
            'Set the parent category to get the direct children from',
            true,
        );

        $this->registerArgument(
            'areasOfActivity',
            'array',
            'Pre defined categories which should be filtered by parent category',
            false,
            [],
        );
    }

    /**
     * Get direct child categories of defined root category in extConf
     */
    public function render(): array
    {
        $categories = [];
        if ($this->arguments['areasOfActivity'] !== []) {
            /** @var Category $areaOfActivity */
            foreach ($this->arguments['areasOfActivity'] as $areaOfActivity) {
                $parentCategory = $areaOfActivity->getParent();
                if (
                    $parentCategory instanceof Category
                    && $parentCategory->getUid() === $this->arguments['parent']
                ) {
                    $categories[] = $areaOfActivity;
                }
            }
        }

        usort($categories, ['self', 'sortTargetsByTitle']);

        return $categories;
    }

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
