<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UpdateAccountInput Models
 * @subpackage Structs
 */
class UpdateAccountInput extends AbstractStructBase
{
    /**
     * The ClientID
     * @var int
     */
    public $ClientID;
    /**
     * The ClientMemberID
     * @var string
     */
    public $ClientMemberID;
    /**
     * The MembershipID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $MembershipID;
    /**
     * The Prefix
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Prefix;
    /**
     * The FirstName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $FirstName;
    /**
     * The LastName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $LastName;
    /**
     * The MiddleInitial
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $MiddleInitial;
    /**
     * The Suffix
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Suffix;
    /**
     * The Address
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Address;
    /**
     * The Address2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Address2;
    /**
     * The City
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $City;
    /**
     * The State
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $State;
    /**
     * The Zipcode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Zipcode;
    /**
     * The Phone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Phone;
    /**
     * The Email
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Email;
    /**
     * The DOB
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $DOB;
    /**
     * The Gender
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Gender;
    /**
     * The ModifiedBy
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ModifiedBy;
    /**
     * Constructor method for UpdateAccountInput
     * @uses UpdateAccountInput::setClientID()
     * @uses UpdateAccountInput::setClientMemberID()
     * @uses UpdateAccountInput::setMembershipID()
     * @uses UpdateAccountInput::setPrefix()
     * @uses UpdateAccountInput::setFirstName()
     * @uses UpdateAccountInput::setLastName()
     * @uses UpdateAccountInput::setMiddleInitial()
     * @uses UpdateAccountInput::setSuffix()
     * @uses UpdateAccountInput::setAddress()
     * @uses UpdateAccountInput::setAddress2()
     * @uses UpdateAccountInput::setCity()
     * @uses UpdateAccountInput::setState()
     * @uses UpdateAccountInput::setZipcode()
     * @uses UpdateAccountInput::setPhone()
     * @uses UpdateAccountInput::setEmail()
     * @uses UpdateAccountInput::setDOB()
     * @uses UpdateAccountInput::setGender()
     * @uses UpdateAccountInput::setModifiedBy()
     * @param int $clientID
     * @param string $clientMemberID
     * @param int $membershipID
     * @param string $prefix
     * @param string $firstName
     * @param string $lastName
     * @param string $middleInitial
     * @param string $suffix
     * @param string $address
     * @param string $address2
     * @param string $city
     * @param string $state
     * @param string $zipcode
     * @param string $phone
     * @param string $email
     * @param string $dOB
     * @param string $gender
     * @param string $modifiedBy
     */
    public function __construct($clientID = null, $clientMemberID = null, $membershipID = null, $prefix = null, $firstName = null, $lastName = null, $middleInitial = null, $suffix = null, $address = null, $address2 = null, $city = null, $state = null, $zipcode = null, $phone = null, $email = null, $dOB = null, $gender = null, $modifiedBy = null)
    {
        $this
            ->setClientID($clientID)
            ->setClientMemberID($clientMemberID)
            ->setMembershipID($membershipID)
            ->setPrefix($prefix)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setMiddleInitial($middleInitial)
            ->setSuffix($suffix)
            ->setAddress($address)
            ->setAddress2($address2)
            ->setCity($city)
            ->setState($state)
            ->setZipcode($zipcode)
            ->setPhone($phone)
            ->setEmail($email)
            ->setDOB($dOB)
            ->setGender($gender)
            ->setModifiedBy($modifiedBy);
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
     * @return \CYH\Ocenture\Models\UpdateAccountInput
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
     * Get ClientMemberID value
     * @return string|null
     */
    public function getClientMemberID()
    {
        return $this->ClientMemberID;
    }
    /**
     * Set ClientMemberID value
     * @param string $clientMemberID
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setClientMemberID($clientMemberID = null)
    {
        // validation for constraint: string
        if (!is_null($clientMemberID) && !is_string($clientMemberID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($clientMemberID)), __LINE__);
        }
        $this->ClientMemberID = $clientMemberID;
        return $this;
    }
    /**
     * Get MembershipID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getMembershipID()
    {
        return isset($this->MembershipID) ? $this->MembershipID : null;
    }
    /**
     * Set MembershipID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $membershipID
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setMembershipID($membershipID = null)
    {
        // validation for constraint: int
        if (!is_null($membershipID) && !is_numeric($membershipID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($membershipID)), __LINE__);
        }
        if (is_null($membershipID) || (is_array($membershipID) && empty($membershipID))) {
            unset($this->MembershipID);
        } else {
            $this->MembershipID = $membershipID;
        }
        return $this;
    }
    /**
     * Get Prefix value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrefix()
    {
        return isset($this->Prefix) ? $this->Prefix : null;
    }
    /**
     * Set Prefix value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $prefix
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setPrefix($prefix = null)
    {
        // validation for constraint: string
        if (!is_null($prefix) && !is_string($prefix)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($prefix)), __LINE__);
        }
        if (is_null($prefix) || (is_array($prefix) && empty($prefix))) {
            unset($this->Prefix);
        } else {
            $this->Prefix = $prefix;
        }
        return $this;
    }
    /**
     * Get FirstName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFirstName()
    {
        return isset($this->FirstName) ? $this->FirstName : null;
    }
    /**
     * Set FirstName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $firstName
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setFirstName($firstName = null)
    {
        // validation for constraint: string
        if (!is_null($firstName) && !is_string($firstName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($firstName)), __LINE__);
        }
        if (is_null($firstName) || (is_array($firstName) && empty($firstName))) {
            unset($this->FirstName);
        } else {
            $this->FirstName = $firstName;
        }
        return $this;
    }
    /**
     * Get LastName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLastName()
    {
        return isset($this->LastName) ? $this->LastName : null;
    }
    /**
     * Set LastName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $lastName
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setLastName($lastName = null)
    {
        // validation for constraint: string
        if (!is_null($lastName) && !is_string($lastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastName)), __LINE__);
        }
        if (is_null($lastName) || (is_array($lastName) && empty($lastName))) {
            unset($this->LastName);
        } else {
            $this->LastName = $lastName;
        }
        return $this;
    }
    /**
     * Get MiddleInitial value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getMiddleInitial()
    {
        return isset($this->MiddleInitial) ? $this->MiddleInitial : null;
    }
    /**
     * Set MiddleInitial value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $middleInitial
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setMiddleInitial($middleInitial = null)
    {
        // validation for constraint: string
        if (!is_null($middleInitial) && !is_string($middleInitial)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($middleInitial)), __LINE__);
        }
        if (is_null($middleInitial) || (is_array($middleInitial) && empty($middleInitial))) {
            unset($this->MiddleInitial);
        } else {
            $this->MiddleInitial = $middleInitial;
        }
        return $this;
    }
    /**
     * Get Suffix value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSuffix()
    {
        return isset($this->Suffix) ? $this->Suffix : null;
    }
    /**
     * Set Suffix value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $suffix
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setSuffix($suffix = null)
    {
        // validation for constraint: string
        if (!is_null($suffix) && !is_string($suffix)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($suffix)), __LINE__);
        }
        if (is_null($suffix) || (is_array($suffix) && empty($suffix))) {
            unset($this->Suffix);
        } else {
            $this->Suffix = $suffix;
        }
        return $this;
    }
    /**
     * Get Address value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAddress()
    {
        return isset($this->Address) ? $this->Address : null;
    }
    /**
     * Set Address value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $address
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setAddress($address = null)
    {
        // validation for constraint: string
        if (!is_null($address) && !is_string($address)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($address)), __LINE__);
        }
        if (is_null($address) || (is_array($address) && empty($address))) {
            unset($this->Address);
        } else {
            $this->Address = $address;
        }
        return $this;
    }
    /**
     * Get Address2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAddress2()
    {
        return isset($this->Address2) ? $this->Address2 : null;
    }
    /**
     * Set Address2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $address2
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setAddress2($address2 = null)
    {
        // validation for constraint: string
        if (!is_null($address2) && !is_string($address2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($address2)), __LINE__);
        }
        if (is_null($address2) || (is_array($address2) && empty($address2))) {
            unset($this->Address2);
        } else {
            $this->Address2 = $address2;
        }
        return $this;
    }
    /**
     * Get City value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCity()
    {
        return isset($this->City) ? $this->City : null;
    }
    /**
     * Set City value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $city
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setCity($city = null)
    {
        // validation for constraint: string
        if (!is_null($city) && !is_string($city)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($city)), __LINE__);
        }
        if (is_null($city) || (is_array($city) && empty($city))) {
            unset($this->City);
        } else {
            $this->City = $city;
        }
        return $this;
    }
    /**
     * Get State value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getState()
    {
        return isset($this->State) ? $this->State : null;
    }
    /**
     * Set State value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $state
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setState($state = null)
    {
        // validation for constraint: string
        if (!is_null($state) && !is_string($state)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($state)), __LINE__);
        }
        if (is_null($state) || (is_array($state) && empty($state))) {
            unset($this->State);
        } else {
            $this->State = $state;
        }
        return $this;
    }
    /**
     * Get Zipcode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getZipcode()
    {
        return isset($this->Zipcode) ? $this->Zipcode : null;
    }
    /**
     * Set Zipcode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $zipcode
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setZipcode($zipcode = null)
    {
        // validation for constraint: string
        if (!is_null($zipcode) && !is_string($zipcode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($zipcode)), __LINE__);
        }
        if (is_null($zipcode) || (is_array($zipcode) && empty($zipcode))) {
            unset($this->Zipcode);
        } else {
            $this->Zipcode = $zipcode;
        }
        return $this;
    }
    /**
     * Get Phone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPhone()
    {
        return isset($this->Phone) ? $this->Phone : null;
    }
    /**
     * Set Phone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $phone
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setPhone($phone = null)
    {
        // validation for constraint: string
        if (!is_null($phone) && !is_string($phone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($phone)), __LINE__);
        }
        if (is_null($phone) || (is_array($phone) && empty($phone))) {
            unset($this->Phone);
        } else {
            $this->Phone = $phone;
        }
        return $this;
    }
    /**
     * Get Email value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEmail()
    {
        return isset($this->Email) ? $this->Email : null;
    }
    /**
     * Set Email value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $email
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setEmail($email = null)
    {
        // validation for constraint: string
        if (!is_null($email) && !is_string($email)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($email)), __LINE__);
        }
        if (is_null($email) || (is_array($email) && empty($email))) {
            unset($this->Email);
        } else {
            $this->Email = $email;
        }
        return $this;
    }
    /**
     * Get DOB value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDOB()
    {
        return isset($this->DOB) ? $this->DOB : null;
    }
    /**
     * Set DOB value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $dOB
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setDOB($dOB = null)
    {
        // validation for constraint: string
        if (!is_null($dOB) && !is_string($dOB)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($dOB)), __LINE__);
        }
        if (is_null($dOB) || (is_array($dOB) && empty($dOB))) {
            unset($this->DOB);
        } else {
            $this->DOB = $dOB;
        }
        return $this;
    }
    /**
     * Get Gender value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getGender()
    {
        return isset($this->Gender) ? $this->Gender : null;
    }
    /**
     * Set Gender value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $gender
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setGender($gender = null)
    {
        // validation for constraint: string
        if (!is_null($gender) && !is_string($gender)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($gender)), __LINE__);
        }
        if (is_null($gender) || (is_array($gender) && empty($gender))) {
            unset($this->Gender);
        } else {
            $this->Gender = $gender;
        }
        return $this;
    }
    /**
     * Get ModifiedBy value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getModifiedBy()
    {
        return isset($this->ModifiedBy) ? $this->ModifiedBy : null;
    }
    /**
     * Set ModifiedBy value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $modifiedBy
     * @return \CYH\Ocenture\Models\UpdateAccountInput
     */
    public function setModifiedBy($modifiedBy = null)
    {
        // validation for constraint: string
        if (!is_null($modifiedBy) && !is_string($modifiedBy)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($modifiedBy)), __LINE__);
        }
        if (is_null($modifiedBy) || (is_array($modifiedBy) && empty($modifiedBy))) {
            unset($this->ModifiedBy);
        } else {
            $this->ModifiedBy = $modifiedBy;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\UpdateAccountInput
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
