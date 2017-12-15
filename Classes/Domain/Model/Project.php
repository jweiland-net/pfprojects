<?php declare(strict_types=1);
namespace JWeiland\Pfprojects\Domain\Model;

/*
 * This file is part of the service_bw2 project.
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
use JWeiland\ServiceBw2\Utility\ModelUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Projects
 */
class Project extends AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * startDate
     *
     * @var \DateTime
     */
    protected $startDate;

    /**
     * status
     *
     * @var string
     */
    protected $status = '';

    /**
     * contactPerson
     *
     * @var string
     */
    protected $contactPerson = '';

    /**
     * telephone
     *
     * @var string
     */
    protected $telephone = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * officeType
     *
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
     * officeManuell
     *
     * @var string
     */
    protected $officeManuell = '';

    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * TxMaps2Uid
     *
     * @var \JWeiland\Maps2\Domain\Model\PoiCollection
     */
    protected $txMaps2Uid;

    /**
     * files
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    /**
     * links
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Pfprojects\Domain\Model\Link>
     */
    protected $links;

    /**
     * areaOfActivity
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Pfprojects\Domain\Model\Category>
     */
    protected $areaOfActivity;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all \TYPO3\CMS\Extbase\Persistence\ObjectStorage properties.
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->images = new ObjectStorage();
        $this->files = new ObjectStorage();
        $this->links = new ObjectStorage();
        $this->areaOfActivity = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the startDate
     *
     * @return \DateTime $startDate
     */
    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    /**
     * Sets the startDate
     *
     * @param \DateTime $startDate
     * @return void
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns the status
     *
     * @return string $status
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param string $status
     * @return void
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * Returns the contactPerson
     *
     * @return string $contactPerson
     */
    public function getContactPerson(): string
    {
        return $this->contactPerson;
    }

    /**
     * Sets the contactPerson
     *
     * @param string $contactPerson
     * @return void
     */
    public function setContactPerson(string $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * Returns the telephone
     *
     * @return string $telephone
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * Sets the telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the officeType
     *
     * @return bool $officeType
     */
    public function getOfficeType(): bool
    {
        return $this->officeType;
    }

    /**
     * Sets the officeType
     *
     * @param bool $officeType
     * @return void
     */
    public function setOfficeType(bool $officeType)
    {
        $this->officeType = $officeType;
    }

    /**
     * Returns Organisationseinheit
     *
     * @return array
     */
    public function getOrganisationseinheit(): array
    {
        return $this->organisationseinheit = ModelUtility::getOrganisationseinheiten($this->organisationseinheit);
    }

    /**
     * Sets Organisationseinheit
     *
     * @param array $organisationseinheit
     */
    public function setOrganisationseinheit(array $organisationseinheit)
    {
        $this->organisationseinheit = $organisationseinheit;
    }

    /**
     * Returns the officeManuell
     *
     * @return string $officeManuell
     */
    public function getOfficeManuell(): string
    {
        return $this->officeManuell;
    }

    /**
     * Sets the officeManuell
     *
     * @param string $officeManuell
     * @return void
     */
    public function setOfficeManuell(string $officeManuell)
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
    public function getOffice()
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

    /**
     * Returns the images
     *
     * @return ObjectStorage $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param ObjectStorage $images
     * @return void
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the txMaps2Uid
     *
     * @return PoiCollection|null $txMaps2Uid
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * Sets the txMaps2Uid
     *
     * @param PoiCollection $txMaps2Uid
     * @return void
     */
    public function setTxMaps2Uid(PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * Returns the files
     *
     * @return ObjectStorage $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets the files
     *
     * @param ObjectStorage $files
     * @return void
     */
    public function setFiles(ObjectStorage $files)
    {
        $this->files = $files;
    }

    /**
     * Returns the links
     *
     * @return ObjectStorage $links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets the links
     *
     * @param ObjectStorage $links
     * @return void
     */
    public function setLinks(ObjectStorage $links)
    {
        $this->links = $links;
    }

    /**
     * Returns the areaOfActivity
     *
     * @return ObjectStorage $areaOfActivity
     */
    public function getAreaOfActivity()
    {
        return $this->areaOfActivity;
    }

    /**
     * Sets the areaOfActivity
     *
     * @param ObjectStorage $areaOfActivity
     * @return void
     */
    public function setAreaOfActivity(ObjectStorage $areaOfActivity)
    {
        $this->areaOfActivity = $areaOfActivity;
    }

}
