<?php
namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

/*
 * This file is part of the pfprojects project..
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

use JWeiland\Pfprojects\Domain\Repository\CategoryRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Query;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Test case for class \JWeiland\Pfprojects\Domain\Repository\CategoryRepository.
 */
class CategoryRepositoryTest extends UnitTestCase
{
    /**
     * @var CategoryRepository
     */
    protected $subject;

    /**
     * @var PersistenceManager|ObjectProphecy
     */
    protected $persistenceManagerProphecy;

    /**
     * set up class
     */
    public function setUp()
    {
        $query = new Query('type');

        $this->persistenceManagerProphecy = $this->prophesize(PersistenceManager::class);
        $this->persistenceManagerProphecy
            ->createQueryForType(Argument::cetera())
            ->shouldBeCalled()
            ->willReturn($query);

        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->subject = new CategoryRepository($objectManager);
        $this->subject->injectPersistenceManager($this->persistenceManagerProphecy->reveal());
    }

    /**
     * tear down class
     */
    public function tearDown()
    {
        unset(
            $this->subject,
            $this->persistenceManagerProphecy
        );
    }

    /**
     * @test
     */
    public function categoriesAreSortedByTitleAsDefault()
    {
        $expectedResult = [
            'title' => QueryInterface::ORDER_ASCENDING
        ];
        $this->assertSame(
            $expectedResult,
            $this->subject->createQuery()->getOrderings()
        );
    }
}
