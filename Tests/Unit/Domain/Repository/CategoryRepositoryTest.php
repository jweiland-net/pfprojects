<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

use JWeiland\Pfprojects\Domain\Repository\CategoryRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use TYPO3\CMS\Core\DependencyInjection\FailsafeContainer;
use TYPO3\CMS\Extbase\Object\Container\Container;
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

        $psrContainer = new FailsafeContainer();
        $objectManager = new ObjectManager($psrContainer, new Container($psrContainer));
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
        self::assertSame(
            $expectedResult,
            $this->subject->createQuery()->getOrderings()
        );
    }
}
