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
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        $this->assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getStartDateInitiallyReturnsNull()
    {
        $this->assertNull(
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

        $this->assertSame(
            $date,
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function getStatusInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getStatus());
    }

    /**
     * @test
     */
    public function setStatusWithBooleanResultsInString()
    {
        $this->subject->setStatus(true);
        $this->assertSame('1', $this->subject->getStatus());
    }

    /**
     * @test
     */
    public function getContactPersonInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function setContactPersonWithBooleanResultsInString()
    {
        $this->subject->setContactPerson(true);
        $this->assertSame('1', $this->subject->getContactPerson());
    }

    /**
     * @test
     */
    public function getTelephoneInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function setTelephoneWithBooleanResultsInString()
    {
        $this->subject->setTelephone(true);
        $this->assertSame('1', $this->subject->getTelephone());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        $this->assertSame('1', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function getOfficeTypeInitiallyReturnsFalse()
    {
        $this->assertFalse(
            $this->subject->getOfficeType()
        );
    }

    /**
     * @test
     */
    public function setOfficeTypeSetsOfficeType()
    {
        $this->subject->setOfficeType(true);
        $this->assertTrue(
            $this->subject->getOfficeType()
        );
    }

    /**
     * @test
     */
    public function setOfficeTypeWithStringReturnsTrue()
    {
        $this->subject->setOfficeType('foo bar');
        $this->assertTrue($this->subject->getOfficeType());
    }

    /**
     * @test
     */
    public function setOfficeTypeWithZeroReturnsFalse()
    {
        $this->subject->setOfficeType(0);
        $this->assertFalse($this->subject->getOfficeType());
    }

    /**
     * @test
     */
    public function getOfficeManuellInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getOfficeManuell());
    }

    /**
     * @test
     */
    public function setOfficeManuellWithBooleanResultsInString()
    {
        $this->subject->setOfficeManuell(true);
        $this->assertSame('1', $this->subject->getOfficeManuell());
    }

    /**
     * @test
     */
    public function getImagesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
            $instance,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function getDescriptionInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function setDescriptionWithBooleanResultsInString()
    {
        $this->subject->setDescription(true);
        $this->assertSame('1', $this->subject->getDescription());
    }

    /**
     * @test
     */
    public function getTxMaps2UidInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getTxMaps2Uid());
    }

    /**
     * @test
     */
    public function setTxMaps2UidSetsTxMaps2Uid()
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        $this->assertSame(
            $instance,
            $this->subject->getTxMaps2Uid()
        );
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
            $instance,
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function getLinksInitiallyReturnsObjectStorage()
    {
        $this->assertEquals(
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

        $this->assertSame(
            $instance,
            $this->subject->getLinks()
        );
    }
}
