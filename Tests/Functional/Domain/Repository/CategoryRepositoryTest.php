<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Tests\Functional\Domain\Repository;

use JWeiland\Pfprojects\Domain\Repository\CategoryRepository;
use Nimut\TestingFramework\TestCase\FunctionalTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Test case for class \JWeiland\Pfprojects\Domain\Repository\CategoryRepository.
 */
class CategoryRepositoryTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = ['typo3conf/ext/pfprojects'];

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = GeneralUtility::makeInstance(ObjectManager::class)
            ->get(CategoryRepository::class);
    }

    protected function tearDown(): void
    {
        unset(
            $this->categoryRepository
        );

        parent::tearDown();
    }

    /**
     * @test
     */
    public function categoriesAreSortedByTitleAsDefault()
    {
        $expectedResult = [
            'title' => QueryInterface::ORDER_ASCENDING
        ];
        self::assertSame(
            $expectedResult,
            $this->categoryRepository->createQuery()->getOrderings()
        );
    }
}
