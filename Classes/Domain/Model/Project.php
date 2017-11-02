<?php
namespace JWeiland\Pfprojects\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Stefan Froemken <projects@jweiland.net>, jweiland.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
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
    protected $startDate = null;

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
     * officeEgovernment
     *
     * @var \Tx_WesEgovernment_Domain_Model_Department
     */
    protected $officeEgovernment = null;

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
    protected $images = null;

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
    protected $files = null;

    /**
     * links
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JWeiland\Pfprojects\Domain\Model\Link>
     */
    protected $links = null;

    /**
     * areaOfActivity
     *
     * @var \SplObjectStorage<\JWeiland\Pfprojects\Domain\Model\Category>
     */
    protected $areaOfActivity = NULL;

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
    public function setTitle($title)
    {
        $this->title = (string)$title;
    }

    /**
     * Returns the startDate
     *
     * @return \DateTime $startDate
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the startDate
     *
     * @param \DateTime $startDate
     * @return void
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns the status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = (string)$status;
    }

    /**
     * Returns the contactPerson
     *
     * @return string $contactPerson
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Sets the contactPerson
     *
     * @param string $contactPerson
     * @return void
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }

    /**
     * Returns the telephone
     *
     * @return string $telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Sets the telephone
     *
     * @param string $telephone
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the officeType
     *
     * @return bool $officeType
     */
    public function getOfficeType()
    {
        return $this->officeType;
    }

    /**
     * Sets the officeType
     *
     * @param bool $officeType
     * @return void
     */
    public function setOfficeType($officeType)
    {
        $this->officeType = (bool)$officeType;
    }

    /**
     * Returns the officeEgovernment
     *
     * @return \Tx_WesEgovernment_Domain_Model_Department $officeEgovernment
     */
    public function getOfficeEgovernment()
    {
        return $this->officeEgovernment;
    }

    /**
     * Sets the officeEgovernment
     *
     * @param \Tx_WesEgovernment_Domain_Model_Department $officeEgovernment
     * @return void
     */
    public function setOfficeEgovernment($officeEgovernment)
    {
        $this->officeEgovernment = $officeEgovernment;
    }

    /**
     * Returns the officeManuell
     *
     * @return string $officeManuell
     */
    public function getOfficeManuell()
    {
        return $this->officeManuell;
    }

    /**
     * Sets the officeManuell
     *
     * @param string $officeManuell
     * @return void
     */
    public function setOfficeManuell($officeManuell)
    {
        $this->officeManuell = (string)$officeManuell;
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
        } else {
            if ($this->getOfficeEgovernment() instanceof \Tx_WesEgovernment_Domain_Model_Department) {
                return $this->getOfficeEgovernment()->getTitle();
            } else {
                return '';
            }
        }
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the txMaps2Uid
     *
     * @return \JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid
     */
    public function getTxMaps2Uid()
    {
        return $this->txMaps2Uid;
    }

    /**
     * Sets the txMaps2Uid
     *
     * @param \JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid
     * @return void
     */
    public function setTxMaps2Uid(\JWeiland\Maps2\Domain\Model\PoiCollection $txMaps2Uid)
    {
        $this->txMaps2Uid = $txMaps2Uid;
    }

    /**
     * Returns the files
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $files
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Sets the files
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $files
     * @return void
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * Returns the links
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $links
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Sets the links
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $links
     * @return void
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * Returns the areaOfActivity
     *
     * @return ObjectStorage $areaOfActivity
     */
    public function getAreaOfActivity() {
        return $this->areaOfActivity;
    }

    /**
     * Sets the areaOfActivity
     *
     * @param ObjectStorage $areaOfActivity
     * @return void
     */
    public function setAreaOfActivity(ObjectStorage $areaOfActivity) {
        $this->areaOfActivity = $areaOfActivity;
    }

}
