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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The main project domain model
 */
class Project extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var \DateTime
     */
    protected $startDate;

    /**
     * @var string
     */
    protected $status = '';

    /**
     * @var string
     */
    protected $contactPerson = '';

    /**
     * @var string
     */
    protected $telephone = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var bool
     */
    protected $officeType = false;

    /**
     * Organisationseinheit from ext:service_bw2
     * Will be an array after first getter call!
     *
     * @var int
     */
    protected $organisationseinheit = 0;

    /**
     * @var string
     */
    protected $officeManuell = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Pfprojects\Domain\Model\Link>
     */
    protected $links;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Pfprojects\Domain\Model\Category>
     */
    protected $areaOfActivity;

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

    public function setStartDate(\DateTime $startDate = null): void
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
        return $this->organisationseinheit = ModelUtility::getOrganisationseinheiten($this->organisationseinheit);
    }

    public function setOrganisationseinheit(array $organisationseinheit): void
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
     *
     * @return string
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTxMaps2Uid(): ?PoiCollection
    {
        return $this->txMaps2Uid;
    }

    public function setTxMaps2Uid(PoiCollection $txMaps2Uid = null): void
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    public function setFiles(ObjectStorage $files): void
    {
        $this->files = $files;
    }

    public function getLinks(): ObjectStorage
    {
        return $this->links;
    }

    public function setLinks(ObjectStorage $links): void
    {
        $this->links = $links;
    }

    public function getAreaOfActivity(): ObjectStorage
    {
        return $this->areaOfActivity;
    }

    public function setAreaOfActivity(ObjectStorage $areaOfActivity): void
    {
        $this->areaOfActivity = $areaOfActivity;
    }
}
