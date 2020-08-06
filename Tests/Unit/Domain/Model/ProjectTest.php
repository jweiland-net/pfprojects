<?php

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Pfprojects\Domain\Model\Project;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case for class \JWeiland\Pfprojects\Domain\Model\Project.
 */
class ProjectTest extends UnitTestCase
{
    /**
     * @var Project
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Project();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
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
    public function setTitleWithIntegerResultsInString()
    {
        $this->subject->setTitle(123);
        self::assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        self::assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getStartDateInitiallyReturnsNull()
    {
        self::assertNull(
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function setStartDateSetsStartDate()
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
    public function getStatusInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusSetsStatus()
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
    public function setStatusWithIntegerResultsInString()
    {
        $this->subject->setStatus(123);
        self::assertSame('123', $this->subject->getStatus());
    }

    /**
     * @test
     */
    public function setStatusWithBooleanResultsInString()
    {
        $this->subject->setStatus(true);
        self::assertSame('1', $this->subject->getStatus());
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonSetsContactPerson()
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
    public function setContactPersonWithIntegerResultsInString()
    {
        $this->subject->setContactPerson(123);
        self::assertSame('123', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function setContactPersonWithBooleanResultsInString()
    {
        $this->subject->setContactPerson(true);
        self::assertSame('1', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getTelephone()
        );
    }

    /**
     * @test
     */
    public function setTelephoneSetsTelephone()
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
    public function setTelephoneWithIntegerResultsInString()
    {
        $this->subject->setTelephone(123);
        self::assertSame('123', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function setTelephoneWithBooleanResultsInString()
    {
        $this->subject->setTelephone(true);
        self::assertSame('1', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail()
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
    public function setEmailWithIntegerResultsInString()
    {
        $this->subject->setEmail(123);
        self::assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        self::assertSame('1', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getOfficeTypeInitiallyReturnsFalse()
    {
        self::assertFalse(
            $this->subject->getOfficeType()
        );
    }

    /**
     * @test
     */
    public function setOfficeTypeSetsOfficeType()
    {
        $this->subject->setOfficeType(true);
        self::assertTrue(
            $this->subject->getOfficeType()
        );
    }

    /**
     * @test
     */
    public function setOfficeTypeWithStringReturnsTrue()
    {
        $this->subject->setOfficeType('foo bar');
        self::assertTrue($this->subject->getOfficeType());
    }

    /**
     * @test
     */
    public function setOfficeTypeWithZeroReturnsFalse()
    {
        $this->subject->setOfficeType(0);
        self::assertFalse($this->subject->getOfficeType());
    }

    /**
     * @test
     */
    public function getOfficeManuellInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getOfficeManuell()
        );
    }

    /**
     * @test
     */
    public function setOfficeManuellSetsOfficeManuell()
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
    public function setOfficeManuellWithIntegerResultsInString()
    {
        $this->subject->setOfficeManuell(123);
        self::assertSame('123', $this->subject->getOfficeManuell());
    }

    /**
     * @test
     */
    public function setOfficeManuellWithBooleanResultsInString()
    {
        $this->subject->setOfficeManuell(true);
        self::assertSame('1', $this->subject->getOfficeManuell());
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesSetsImages()
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
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionSetsDescription()
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
    public function setDescriptionWithIntegerResultsInString()
    {
        $this->subject->setDescription(123);
        self::assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        self::assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
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
    public function getFilesInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles()
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
    public function getLinksInitiallyReturnsObjectStorage()
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks()
        );
    }

    /**
     * @test
     */
    public function setLinksSetsLinks()
    {
        $instance = new ObjectStorage();
        $this->subject->setLinks($instance);

        self::assertSame(
            $instance,
            $this->subject->getLinks()
        );
    }
}
