<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

/**
 * Domain model for links which are related to projects
 */
class Category extends AbstractEntity
{
    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $title = '';

    protected string $description = '';

    /**
     * Because of "lazy" we can't set type to this property.
     * ToDo: Use multi types (PHP 8.1)
     *
     * @var Category|null
     * @Extbase\ORM\Lazy
     */
    protected $parent;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getParent(): ?Category
    {
        if ($this->parent instanceof LazyLoadingProxy) {
            $this->parent->_loadRealInstance();
        }

        return $this->parent;
    }

    public function setParent(Category $parent): void
    {
        $this->parent = $parent;
    }
}
