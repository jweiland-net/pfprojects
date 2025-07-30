<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Tests\Unit\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\Pfprojects\Domain\Model\Project;
use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case.
 */
class ProjectTest extends FunctionalTestCase
{
    protected Project $subject;

    protected array $testExtensionsToLoad = [
        'jweiland/maps2',
        'jweiland/service-bw2',
        'typo3/cms-scheduler',
        'jweiland/pfprojects',
        'jweiland/service-bw2',
        'typo3/cms-scheduler',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new Project();
    }

    protected function tearDown(): void
    {
        unset(
            $this->subject,
        );

        parent::tearDown();
    }

    #[Test]
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function getStartDateInitiallyReturnsNull(): void
    {
        self::assertNull(
            $this->subject->getStartDate(),
        );
    }

    #[Test]
    public function setStartDateSetsStartDate(): void
    {
        $date = new \DateTime();
        $this->subject->setStartDate($date);

        self::assertSame(
            $date,
            $this->subject->getStartDate(),
        );
    }

    #[Test]
    public function getStatusInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStatus(),
        );
    }

    #[Test]
    public function setStatusSetsStatus(): void
    {
        $this->subject->setStatus('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getStatus(),
        );
    }

    #[Test]
    public function getContactPersonInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getContactPerson(),
        );
    }

    #[Test]
    public function setContactPersonSetsContactPerson(): void
    {
        $this->subject->setContactPerson('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getContactPerson(),
        );
    }

    #[Test]
    public function getTelephoneInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTelephone(),
        );
    }

    #[Test]
    public function setTelephoneSetsTelephone(): void
    {
        $this->subject->setTelephone('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTelephone(),
        );
    }

    #[Test]
    public function getEmailInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmail(),
        );
    }

    #[Test]
    public function setEmailSetsEmail(): void
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail(),
        );
    }

    #[Test]
    public function getOfficeTypeInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->getOfficeType(),
        );
    }

    #[Test]
    public function setOfficeTypeSetsOfficeType(): void
    {
        $this->subject->setOfficeType(true);
        self::assertTrue(
            $this->subject->getOfficeType(),
        );
    }

    #[Test]
    public function getOfficeManuellInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getOfficeManuell(),
        );
    }

    #[Test]
    public function setOfficeManuellSetsOfficeManuell(): void
    {
        $this->subject->setOfficeManuell('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getOfficeManuell(),
        );
    }

    #[Test]
    public function getImagesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function setImagesSetsImages(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setImages($instance);

        self::assertSame(
            $instance,
            $this->subject->getImages(),
        );
    }

    #[Test]
    public function getDescriptionInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription(),
        );
    }

    #[Test]
    public function setDescriptionSetsDescription(): void
    {
        $this->subject->setDescription('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getDescription(),
        );
    }

    #[Test]
    public function getTxMaps2UidInitiallyReturnsNull(): void
    {
        self::assertNull($this->subject->getTxMaps2Uid());
    }

    #[Test]
    public function setTxMaps2UidSetsTxMaps2Uid(): void
    {
        $instance = new PoiCollection();
        $this->subject->setTxMaps2Uid($instance);

        self::assertSame(
            $instance,
            $this->subject->getTxMaps2Uid(),
        );
    }

    #[Test]
    public function getFilesInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function setFilesSetsFiles(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setFiles($instance);

        self::assertSame(
            $instance,
            $this->subject->getFiles(),
        );
    }

    #[Test]
    public function getLinksInitiallyReturnsObjectStorage(): void
    {
        self::assertEquals(
            new ObjectStorage(),
            $this->subject->getLinks(),
        );
    }

    #[Test]
    public function setLinksSetsLinks(): void
    {
        $instance = new ObjectStorage();
        $this->subject->setLinks($instance);

        self::assertSame(
            $instance,
            $this->subject->getLinks(),
        );
    }
}
