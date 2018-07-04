<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UMSInsertInput Models
 * @subpackage Structs
 */
class UMSInsertInput extends AbstractStructBase
{
    /**
     * The ClientID
     * @var int
     */
    public $ClientID;
    /**
     * The RepID
     * @var string
     */
    public $RepID;
    /**
     * The SponsorID
     * @var string
     */
    public $SponsorID;
    /**
     * The UplineID
     * @var string
     */
    public $UplineID;
    /**
     * The Rank
     * @var int
     */
    public $Rank;
    /**
     * The FirstName
     * @var string
     */
    public $FirstName;
    /**
     * The LastName
     * @var string
     */
    public $LastName;
    /**
     * The Address
     * @var string
     */
    public $Address;
    /**
     * The City
     * @var string
     */
    public $City;
    /**
     * The StateProvince
     * @var string
     */
    public $StateProvince;
    /**
     * The Country
     * @var string
     */
    public $Country;
    /**
     * The ZipCode
     * @var string
     */
    public $ZipCode;
    /**
     * The JoinDate
     * @var string
     */
    public $JoinDate;
    /**
     * The Active
     * @var int
     */
    public $Active;
    /**
     * Constructor method for UMSInsertInput
     * @uses UMSInsertInput::setClientID()
     * @uses UMSInsertInput::setRepID()
     * @uses UMSInsertInput::setSponsorID()
     * @uses UMSInsertInput::setUplineID()
     * @uses UMSInsertInput::setRank()
     * @uses UMSInsertInput::setFirstName()
     * @uses UMSInsertInput::setLastName()
     * @uses UMSInsertInput::setAddress()
     * @uses UMSInsertInput::setCity()
     * @uses UMSInsertInput::setStateProvince()
     * @uses UMSInsertInput::setCountry()
     * @uses UMSInsertInput::setZipCode()
     * @uses UMSInsertInput::setJoinDate()
     * @uses UMSInsertInput::setActive()
     * @param int $clientID
     * @param string $repID
     * @param string $sponsorID
     * @param string $uplineID
     * @param int $rank
     * @param string $firstName
     * @param string $lastName
     * @param string $address
     * @param string $city
     * @param string $stateProvince
     * @param string $country
     * @param string $zipCode
     * @param string $joinDate
     * @param int $active
     */
    public function __construct($clientID = null, $repID = null, $sponsorID = null, $uplineID = null, $rank = null, $firstName = null, $lastName = null, $address = null, $city = null, $stateProvince = null, $country = null, $zipCode = null, $joinDate = null, $active = null)
    {
        $this
            ->setClientID($clientID)
            ->setRepID($repID)
            ->setSponsorID($sponsorID)
            ->setUplineID($uplineID)
            ->setRank($rank)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setAddress($address)
            ->setCity($city)
            ->setStateProvince($stateProvince)
            ->setCountry($country)
            ->setZipCode($zipCode)
            ->setJoinDate($joinDate)
            ->setActive($active);
    }
    /**
     * Get ClientID value
     * @return int|null
     */
    public function getClientID()
    {
        return $this->ClientID;
    }
    /**
     * Set ClientID value
     * @param int $clientID
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setClientID($clientID = null)
    {
        // validation for constraint: int
        if (!is_null($clientID) && !is_numeric($clientID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($clientID)), __LINE__);
        }
        $this->ClientID = $clientID;
        return $this;
    }
    /**
     * Get RepID value
     * @return string|null
     */
    public function getRepID()
    {
        return $this->RepID;
    }
    /**
     * Set RepID value
     * @param string $repID
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setRepID($repID = null)
    {
        // validation for constraint: string
        if (!is_null($repID) && !is_string($repID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($repID)), __LINE__);
        }
        $this->RepID = $repID;
        return $this;
    }
    /**
     * Get SponsorID value
     * @return string|null
     */
    public function getSponsorID()
    {
        return $this->SponsorID;
    }
    /**
     * Set SponsorID value
     * @param string $sponsorID
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setSponsorID($sponsorID = null)
    {
        // validation for constraint: string
        if (!is_null($sponsorID) && !is_string($sponsorID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($sponsorID)), __LINE__);
        }
        $this->SponsorID = $sponsorID;
        return $this;
    }
    /**
     * Get UplineID value
     * @return string|null
     */
    public function getUplineID()
    {
        return $this->UplineID;
    }
    /**
     * Set UplineID value
     * @param string $uplineID
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setUplineID($uplineID = null)
    {
        // validation for constraint: string
        if (!is_null($uplineID) && !is_string($uplineID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($uplineID)), __LINE__);
        }
        $this->UplineID = $uplineID;
        return $this;
    }
    /**
     * Get Rank value
     * @return int|null
     */
    public function getRank()
    {
        return $this->Rank;
    }
    /**
     * Set Rank value
     * @param int $rank
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setRank($rank = null)
    {
        // validation for constraint: int
        if (!is_null($rank) && !is_numeric($rank)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($rank)), __LINE__);
        }
        $this->Rank = $rank;
        return $this;
    }
    /**
     * Get FirstName value
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }
    /**
     * Set FirstName value
     * @param string $firstName
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setFirstName($firstName = null)
    {
        // validation for constraint: string
        if (!is_null($firstName) && !is_string($firstName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($firstName)), __LINE__);
        }
        $this->FirstName = $firstName;
        return $this;
    }
    /**
     * Get LastName value
     * @return string|null
     */
    public function getLastName()
    {
        return $this->LastName;
    }
    /**
     * Set LastName value
     * @param string $lastName
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setLastName($lastName = null)
    {
        // validation for constraint: string
        if (!is_null($lastName) && !is_string($lastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastName)), __LINE__);
        }
        $this->LastName = $lastName;
        return $this;
    }
    /**
     * Get Address value
     * @return string|null
     */
    public function getAddress()
    {
        return $this->Address;
    }
    /**
     * Set Address value
     * @param string $address
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setAddress($address = null)
    {
        // validation for constraint: string
        if (!is_null($address) && !is_string($address)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($address)), __LINE__);
        }
        $this->Address = $address;
        return $this;
    }
    /**
     * Get City value
     * @return string|null
     */
    public function getCity()
    {
        return $this->City;
    }
    /**
     * Set City value
     * @param string $city
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setCity($city = null)
    {
        // validation for constraint: string
        if (!is_null($city) && !is_string($city)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($city)), __LINE__);
        }
        $this->City = $city;
        return $this;
    }
    /**
     * Get StateProvince value
     * @return string|null
     */
    public function getStateProvince()
    {
        return $this->StateProvince;
    }
    /**
     * Set StateProvince value
     * @param string $stateProvince
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setStateProvince($stateProvince = null)
    {
        // validation for constraint: string
        if (!is_null($stateProvince) && !is_string($stateProvince)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($stateProvince)), __LINE__);
        }
        $this->StateProvince = $stateProvince;
        return $this;
    }
    /**
     * Get Country value
     * @return string|null
     */
    public function getCountry()
    {
        return $this->Country;
    }
    /**
     * Set Country value
     * @param string $country
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setCountry($country = null)
    {
        // validation for constraint: string
        if (!is_null($country) && !is_string($country)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($country)), __LINE__);
        }
        $this->Country = $country;
        return $this;
    }
    /**
     * Get ZipCode value
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->ZipCode;
    }
    /**
     * Set ZipCode value
     * @param string $zipCode
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setZipCode($zipCode = null)
    {
        // validation for constraint: string
        if (!is_null($zipCode) && !is_string($zipCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($zipCode)), __LINE__);
        }
        $this->ZipCode = $zipCode;
        return $this;
    }
    /**
     * Get JoinDate value
     * @return string|null
     */
    public function getJoinDate()
    {
        return $this->JoinDate;
    }
    /**
     * Set JoinDate value
     * @param string $joinDate
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setJoinDate($joinDate = null)
    {
        // validation for constraint: string
        if (!is_null($joinDate) && !is_string($joinDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($joinDate)), __LINE__);
        }
        $this->JoinDate = $joinDate;
        return $this;
    }
    /**
     * Get Active value
     * @return int|null
     */
    public function getActive()
    {
        return $this->Active;
    }
    /**
     * Set Active value
     * @param int $active
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public function setActive($active = null)
    {
        // validation for constraint: int
        if (!is_null($active) && !is_numeric($active)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($active)), __LINE__);
        }
        $this->Active = $active;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\UMSInsertInput
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
