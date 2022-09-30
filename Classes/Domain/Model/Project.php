<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/pfprojects.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Pfprojects\Domain\Model;

use JWeiland\Maps2\Domain\Model\PoiCollection;
use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The main project domain model
 */
class Project extends AbstractEntity
{
    /**
     * @Extbase\Validate("NotEmpty")
     */
    protected string $title = '';

    protected ?\DateTime $startDate = null;

    protected string $status = '';

    protected string $contactPerson = '';

    protected string $telephone = '';

    protected string $email = '';

    protected bool $officeType = false;

    protected int $organisationseinheit = 0;

    protected string $officeManuell = '';

    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $images;

    protected string $description = '';

    /**
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $files;

    /**
     * @var ObjectStorage<Link>
     */
    protected ObjectStorage $links;

    /**
     * @var ObjectStorage<Category>
     */
    protected ObjectStorage $areaOfActivity;

    protected ?PoiCollection $txMaps2Uid = null;

    public function __construct()
    {
        $this->initStorageObjects();
    }

    protected function initStorageObjects(): void
    {
        $this->images = new ObjectStorage();
        $this->files = new ObjectStorage();
        $this->links = new ObjectStorage();
        $this->areaOfActivity = new ObjectStorage();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): void
    {
        $this->contactPerson = $contactPerson;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getOfficeType(): bool
    {
        return $this->officeType;
    }

    public function setOfficeType(bool $officeType): void
    {
        $this->officeType = $officeType;
    }

    public function getOrganisationseinheit(): array
    {
        try {
            return ModelUtility::getOrganisationseinheiten($this->organisationseinheit);
        } catch (\JsonException $jsonException) {
            return [];
        }
    }

    public function getOrigOrganisationseinheit(): int
    {
        return $this->organisationseinheit;
    }

    public function setOrganisationseinheit(int $organisationseinheit): void
    {
        $this->organisationseinheit = $organisationseinheit;
    }

    public function getOfficeManuell(): string
    {
        return $this->officeManuell;
    }

    public function setOfficeManuell(string $officeManuell): void
    {
        $this->officeManuell = $officeManuell;
    }

    /**
     * Get Office
     * It can handle both kinds of offices
     * Useful for Fluid Templates
     */
    public function getOffice(): string
    {
        if ($this->officeType) {
            // get manually given organizer
            return $this->getOfficeManuell();
        }
        if (!empty($this->organisationseinheit) && !empty($this->getOrganisationseinheit())) {
            // we will get an array like $arr[123 => ['name' => 'John', ...]
            foreach ($this->getOrganisationseinheit() as $record) {
                if (isset($record['name'])) {
                    return $record['name'];
                }
            }
        }
        return '';
    }

    public function getImages(): ObjectStorage
    {
        return $this->images;
    }

    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    public function addImage(FileReference $image): void
    {
        $this->images->attach($image);
    }

    public function removeImage(FileReference $fileReference): void
    {
        $this->images->detach($fileReference);
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    public function setFiles(ObjectStorage $files): void
    {
        $this->files = $files;
    }

    public function addFile(FileReference $file): void
    {
        $this->files->attach($file);
    }

    public function removeFile(FileReference $file): void
    {
        $this->files->detach($file);
    }

    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    public function setLinks(ObjectStorage $links): void
    {
        $this->links = $links;
    }

    public function addLink(Link $link): void
    {
        $this->links->attach($link);
    }

    public function removeLink(Link $link): void
    {
        $this->links->detach($link);
    }

    public function getAreaOfActivity(): ObjectStorage
    {
        return $this->areaOfActivity;
    }

    public function setAreaOfActivity(ObjectStorage $areaOfActivity): void
    {
        $this->areaOfActivity = $areaOfActivity;
    }

    public function addAreaOfActivity(Category $areaOfActivity): void
    {
        $this->areaOfActivity->attach($areaOfActivity);
    }

    public function removeAreaOfActivity(Category $areaOfActivity): void
    {
        $this->areaOfActivity->detach($areaOfActivity);
    }

    public function getTxMaps2Uid(): ?PoiCollection
    {
        return $this->txMaps2Uid;
    }

    public function setTxMaps2Uid(PoiCollection $txMaps2Uid): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }
}
