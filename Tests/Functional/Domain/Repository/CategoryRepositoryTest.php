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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case.
 */
class CategoryRepositoryTest extends FunctionalTestCase
{
    /**
     * @var string[]
     */
    protected array $testExtensionsToLoad = [
        'jweiland/ext/pfprojects',
    ];

    /**
     * @var CategoryRepository
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = GeneralUtility::makeInstance(CategoryRepository::class);
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject,
        );

        parent::tearDown();
    }

    /**
     * @test
     */
    public function categoriesAreSortedByTitleAsDefault(): void
    {
        $expectedResult = [
            'title' => QueryInterface::ORDER_ASCENDING,
        ];

        self::assertSame(
            $expectedResult,
            $this->subject->createQuery()->getOrderings(),
        );
    }

    /**
     * @test
     */
    public function respectStoragePageIsDisabled(): void
    {
        self::assertFalse(
            $this->subject->createQuery()->getQuerySettings()->getRespectStoragePage(),
        );
    }
}
