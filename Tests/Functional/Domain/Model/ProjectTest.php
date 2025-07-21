<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;
use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Pfprojects\Domain\Model\Project;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 */
class ProjectTest extends FunctionalTestCase
{
    /**
     * @var Project
     */
    protected $subject;

    /**
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/maps2',
        'typo3conf/ext/pfprojects',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject
        );

        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function getStartDateInitiallyReturnsNull(): void
    {
        self::assertNull(
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function setStartDateSetsStartDate(): void
    {
        $date = new \DateTime();
        $this->subject->setStartDate($date);

        self::assertSame(
            $date,
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function getStatusInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusSetsStatus(): void
    {
        $this->subject->setStatus('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonSetsContactPerson(): void
    {
        $this->subject->setContactPerson('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone(): void
    {
        $this->subject->setTelephone('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail(): void
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function getOfficeTypeInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->getOfficeType()
        );
    }

    /**
     * @test
     */
    public function setOfficeTypeSetsOfficeType(): void
    {
        $this->subject->setOfficeType(true);
        self::assertTrue(
            $this->subject->getOfficeType()
        );
    }

    /**
     * @test
     */
    public function getOfficeManuellInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getOfficeManuell()
        );
    }

    /**
     * @test
     */
    public function setOfficeManuellSetsOfficeManuell(): void
    {
        $this->subject->setOfficeManuell('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getOfficeManuell()
        );
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setImages($instance);

        self::assertSame(
            $instance,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid(): void
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setFiles($instance);

        self::assertSame(
            $instance,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksSetsLinks(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setLinks($instance);

        self::assertSame(
            $instance,
            $this->subject->getLinks()
        );
    }
}
