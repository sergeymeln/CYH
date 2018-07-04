<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CreateRetailAccountInput Models
 * @subpackage Structs
 */
class CreateRetailAccountInput extends AbstractStructBase
{
    /**
     * The ClientID
     * @var int
     */
    public $ClientID;
    /**
     * The ProductCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ProductCode;
    /**
     * The BundleCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BundleCode;
    /**
     * The ClientMemberID
     * @var string
     */
    public $ClientMemberID;
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
     * The Country
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Country;
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
     * The UseSameForBilling
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $UseSameForBilling;
    /**
     * The BillingAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingAddress;
    /**
     * The BillingAddress2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingAddress2;
    /**
     * The BillingCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingCity;
    /**
     * The BillingState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingState;
    /**
     * The BillingZipcode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingZipcode;
    /**
     * The BillingCountry
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingCountry;
    /**
     * The BillingPhone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingPhone;
    /**
     * The BillingEmail
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $BillingEmail;
    /**
     * The Username
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Username;
    /**
     * The Password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Password;
    /**
     * The SecurityQuestion
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $SecurityQuestion;
    /**
     * The SecurityAnswer
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SecurityAnswer;
    /**
     * The SSN
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $SSN;
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
     * The AccountType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $AccountType;
    /**
     * The RepID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $RepID;
    /**
     * The ResellerID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $ResellerID;
    /**
     * The PlanCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $PlanCode;
    /**
     * The ContactId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ContactId;
    /**
     * The OpportunityId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $OpportunityId;
    /**
     * The CampaignId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CampaignId;
    /**
     * The AgentId
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $AgentId;
    /**
     * The CreatedBy
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $CreatedBy;
    /**
     * Constructor method for CreateRetailAccountInput
     * @uses CreateRetailAccountInput::setClientID()
     * @uses CreateRetailAccountInput::setProductCode()
     * @uses CreateRetailAccountInput::setBundleCode()
     * @uses CreateRetailAccountInput::setClientMemberID()
     * @uses CreateRetailAccountInput::setPrefix()
     * @uses CreateRetailAccountInput::setFirstName()
     * @uses CreateRetailAccountInput::setLastName()
     * @uses CreateRetailAccountInput::setMiddleInitial()
     * @uses CreateRetailAccountInput::setSuffix()
     * @uses CreateRetailAccountInput::setAddress()
     * @uses CreateRetailAccountInput::setAddress2()
     * @uses CreateRetailAccountInput::setCity()
     * @uses CreateRetailAccountInput::setState()
     * @uses CreateRetailAccountInput::setZipcode()
     * @uses CreateRetailAccountInput::setCountry()
     * @uses CreateRetailAccountInput::setPhone()
     * @uses CreateRetailAccountInput::setEmail()
     * @uses CreateRetailAccountInput::setUseSameForBilling()
     * @uses CreateRetailAccountInput::setBillingAddress()
     * @uses CreateRetailAccountInput::setBillingAddress2()
     * @uses CreateRetailAccountInput::setBillingCity()
     * @uses CreateRetailAccountInput::setBillingState()
     * @uses CreateRetailAccountInput::setBillingZipcode()
     * @uses CreateRetailAccountInput::setBillingCountry()
     * @uses CreateRetailAccountInput::setBillingPhone()
     * @uses CreateRetailAccountInput::setBillingEmail()
     * @uses CreateRetailAccountInput::setUsername()
     * @uses CreateRetailAccountInput::setPassword()
     * @uses CreateRetailAccountInput::setSecurityQuestion()
     * @uses CreateRetailAccountInput::setSecurityAnswer()
     * @uses CreateRetailAccountInput::setSSN()
     * @uses CreateRetailAccountInput::setDOB()
     * @uses CreateRetailAccountInput::setGender()
     * @uses CreateRetailAccountInput::setAccountType()
     * @uses CreateRetailAccountInput::setRepID()
     * @uses CreateRetailAccountInput::setResellerID()
     * @uses CreateRetailAccountInput::setPlanCode()
     * @uses CreateRetailAccountInput::setContactId()
     * @uses CreateRetailAccountInput::setOpportunityId()
     * @uses CreateRetailAccountInput::setCampaignId()
     * @uses CreateRetailAccountInput::setAgentId()
     * @uses CreateRetailAccountInput::setCreatedBy()
     * @param int $clientID
     * @param string $productCode
     * @param string $bundleCode
     * @param string $clientMemberID
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
     * @param string $country
     * @param string $phone
     * @param string $email
     * @param int $useSameForBilling
     * @param string $billingAddress
     * @param string $billingAddress2
     * @param string $billingCity
     * @param string $billingState
     * @param string $billingZipcode
     * @param string $billingCountry
     * @param string $billingPhone
     * @param string $billingEmail
     * @param string $username
     * @param string $password
     * @param int $securityQuestion
     * @param string $securityAnswer
     * @param string $sSN
     * @param string $dOB
     * @param string $gender
     * @param int $accountType
     * @param string $repID
     * @param int $resellerID
     * @param string $planCode
     * @param string $contactId
     * @param string $opportunityId
     * @param string $campaignId
     * @param string $agentId
     * @param string $createdBy
     */
    public function __construct($clientID = null, $productCode = null, $bundleCode = null, $clientMemberID = null, $prefix = null, $firstName = null, $lastName = null, $middleInitial = null, $suffix = null, $address = null, $address2 = null, $city = null, $state = null, $zipcode = null, $country = null, $phone = null, $email = null, $useSameForBilling = null, $billingAddress = null, $billingAddress2 = null, $billingCity = null, $billingState = null, $billingZipcode = null, $billingCountry = null, $billingPhone = null, $billingEmail = null, $username = null, $password = null, $securityQuestion = null, $securityAnswer = null, $sSN = null, $dOB = null, $gender = null, $accountType = null, $repID = null, $resellerID = null, $planCode = null, $contactId = null, $opportunityId = null, $campaignId = null, $agentId = null, $createdBy = null)
    {
        $this
            ->setClientID($clientID)
            ->setProductCode($productCode)
            ->setBundleCode($bundleCode)
            ->setClientMemberID($clientMemberID)
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
            ->setCountry($country)
            ->setPhone($phone)
            ->setEmail($email)
            ->setUseSameForBilling($useSameForBilling)
            ->setBillingAddress($billingAddress)
            ->setBillingAddress2($billingAddress2)
            ->setBillingCity($billingCity)
            ->setBillingState($billingState)
            ->setBillingZipcode($billingZipcode)
            ->setBillingCountry($billingCountry)
            ->setBillingPhone($billingPhone)
            ->setBillingEmail($billingEmail)
            ->setUsername($username)
            ->setPassword($password)
            ->setSecurityQuestion($securityQuestion)
            ->setSecurityAnswer($securityAnswer)
            ->setSSN($sSN)
            ->setDOB($dOB)
            ->setGender($gender)
            ->setAccountType($accountType)
            ->setRepID($repID)
            ->setResellerID($resellerID)
            ->setPlanCode($planCode)
            ->setContactId($contactId)
            ->setOpportunityId($opportunityId)
            ->setCampaignId($campaignId)
            ->setAgentId($agentId)
            ->setCreatedBy($createdBy);
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * Get ProductCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProductCode()
    {
        return isset($this->ProductCode) ? $this->ProductCode : null;
    }
    /**
     * Set ProductCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $productCode
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setProductCode($productCode = null)
    {
        // validation for constraint: string
        if (!is_null($productCode) && !is_string($productCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($productCode)), __LINE__);
        }
        if (is_null($productCode) || (is_array($productCode) && empty($productCode))) {
            unset($this->ProductCode);
        } else {
            $this->ProductCode = $productCode;
        }
        return $this;
    }
    /**
     * Get BundleCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBundleCode()
    {
        return isset($this->BundleCode) ? $this->BundleCode : null;
    }
    /**
     * Set BundleCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $bundleCode
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBundleCode($bundleCode = null)
    {
        // validation for constraint: string
        if (!is_null($bundleCode) && !is_string($bundleCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($bundleCode)), __LINE__);
        }
        if (is_null($bundleCode) || (is_array($bundleCode) && empty($bundleCode))) {
            unset($this->BundleCode);
        } else {
            $this->BundleCode = $bundleCode;
        }
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * Get Country value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCountry()
    {
        return isset($this->Country) ? $this->Country : null;
    }
    /**
     * Set Country value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $country
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setCountry($country = null)
    {
        // validation for constraint: string
        if (!is_null($country) && !is_string($country)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($country)), __LINE__);
        }
        if (is_null($country) || (is_array($country) && empty($country))) {
            unset($this->Country);
        } else {
            $this->Country = $country;
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * Get UseSameForBilling value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getUseSameForBilling()
    {
        return isset($this->UseSameForBilling) ? $this->UseSameForBilling : null;
    }
    /**
     * Set UseSameForBilling value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $useSameForBilling
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setUseSameForBilling($useSameForBilling = null)
    {
        // validation for constraint: int
        if (!is_null($useSameForBilling) && !is_numeric($useSameForBilling)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($useSameForBilling)), __LINE__);
        }
        if (is_null($useSameForBilling) || (is_array($useSameForBilling) && empty($useSameForBilling))) {
            unset($this->UseSameForBilling);
        } else {
            $this->UseSameForBilling = $useSameForBilling;
        }
        return $this;
    }
    /**
     * Get BillingAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingAddress()
    {
        return isset($this->BillingAddress) ? $this->BillingAddress : null;
    }
    /**
     * Set BillingAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingAddress
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingAddress($billingAddress = null)
    {
        // validation for constraint: string
        if (!is_null($billingAddress) && !is_string($billingAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingAddress)), __LINE__);
        }
        if (is_null($billingAddress) || (is_array($billingAddress) && empty($billingAddress))) {
            unset($this->BillingAddress);
        } else {
            $this->BillingAddress = $billingAddress;
        }
        return $this;
    }
    /**
     * Get BillingAddress2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingAddress2()
    {
        return isset($this->BillingAddress2) ? $this->BillingAddress2 : null;
    }
    /**
     * Set BillingAddress2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingAddress2
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingAddress2($billingAddress2 = null)
    {
        // validation for constraint: string
        if (!is_null($billingAddress2) && !is_string($billingAddress2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingAddress2)), __LINE__);
        }
        if (is_null($billingAddress2) || (is_array($billingAddress2) && empty($billingAddress2))) {
            unset($this->BillingAddress2);
        } else {
            $this->BillingAddress2 = $billingAddress2;
        }
        return $this;
    }
    /**
     * Get BillingCity value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingCity()
    {
        return isset($this->BillingCity) ? $this->BillingCity : null;
    }
    /**
     * Set BillingCity value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingCity
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingCity($billingCity = null)
    {
        // validation for constraint: string
        if (!is_null($billingCity) && !is_string($billingCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingCity)), __LINE__);
        }
        if (is_null($billingCity) || (is_array($billingCity) && empty($billingCity))) {
            unset($this->BillingCity);
        } else {
            $this->BillingCity = $billingCity;
        }
        return $this;
    }
    /**
     * Get BillingState value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingState()
    {
        return isset($this->BillingState) ? $this->BillingState : null;
    }
    /**
     * Set BillingState value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingState
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingState($billingState = null)
    {
        // validation for constraint: string
        if (!is_null($billingState) && !is_string($billingState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingState)), __LINE__);
        }
        if (is_null($billingState) || (is_array($billingState) && empty($billingState))) {
            unset($this->BillingState);
        } else {
            $this->BillingState = $billingState;
        }
        return $this;
    }
    /**
     * Get BillingZipcode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingZipcode()
    {
        return isset($this->BillingZipcode) ? $this->BillingZipcode : null;
    }
    /**
     * Set BillingZipcode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingZipcode
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingZipcode($billingZipcode = null)
    {
        // validation for constraint: string
        if (!is_null($billingZipcode) && !is_string($billingZipcode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingZipcode)), __LINE__);
        }
        if (is_null($billingZipcode) || (is_array($billingZipcode) && empty($billingZipcode))) {
            unset($this->BillingZipcode);
        } else {
            $this->BillingZipcode = $billingZipcode;
        }
        return $this;
    }
    /**
     * Get BillingCountry value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingCountry()
    {
        return isset($this->BillingCountry) ? $this->BillingCountry : null;
    }
    /**
     * Set BillingCountry value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingCountry
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingCountry($billingCountry = null)
    {
        // validation for constraint: string
        if (!is_null($billingCountry) && !is_string($billingCountry)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingCountry)), __LINE__);
        }
        if (is_null($billingCountry) || (is_array($billingCountry) && empty($billingCountry))) {
            unset($this->BillingCountry);
        } else {
            $this->BillingCountry = $billingCountry;
        }
        return $this;
    }
    /**
     * Get BillingPhone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingPhone()
    {
        return isset($this->BillingPhone) ? $this->BillingPhone : null;
    }
    /**
     * Set BillingPhone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingPhone
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingPhone($billingPhone = null)
    {
        // validation for constraint: string
        if (!is_null($billingPhone) && !is_string($billingPhone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingPhone)), __LINE__);
        }
        if (is_null($billingPhone) || (is_array($billingPhone) && empty($billingPhone))) {
            unset($this->BillingPhone);
        } else {
            $this->BillingPhone = $billingPhone;
        }
        return $this;
    }
    /**
     * Get BillingEmail value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getBillingEmail()
    {
        return isset($this->BillingEmail) ? $this->BillingEmail : null;
    }
    /**
     * Set BillingEmail value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $billingEmail
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setBillingEmail($billingEmail = null)
    {
        // validation for constraint: string
        if (!is_null($billingEmail) && !is_string($billingEmail)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($billingEmail)), __LINE__);
        }
        if (is_null($billingEmail) || (is_array($billingEmail) && empty($billingEmail))) {
            unset($this->BillingEmail);
        } else {
            $this->BillingEmail = $billingEmail;
        }
        return $this;
    }
    /**
     * Get Username value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUsername()
    {
        return isset($this->Username) ? $this->Username : null;
    }
    /**
     * Set Username value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $username
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setUsername($username = null)
    {
        // validation for constraint: string
        if (!is_null($username) && !is_string($username)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($username)), __LINE__);
        }
        if (is_null($username) || (is_array($username) && empty($username))) {
            unset($this->Username);
        } else {
            $this->Username = $username;
        }
        return $this;
    }
    /**
     * Get Password value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPassword()
    {
        return isset($this->Password) ? $this->Password : null;
    }
    /**
     * Set Password value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $password
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($password)), __LINE__);
        }
        if (is_null($password) || (is_array($password) && empty($password))) {
            unset($this->Password);
        } else {
            $this->Password = $password;
        }
        return $this;
    }
    /**
     * Get SecurityQuestion value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getSecurityQuestion()
    {
        return isset($this->SecurityQuestion) ? $this->SecurityQuestion : null;
    }
    /**
     * Set SecurityQuestion value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $securityQuestion
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setSecurityQuestion($securityQuestion = null)
    {
        // validation for constraint: int
        if (!is_null($securityQuestion) && !is_numeric($securityQuestion)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($securityQuestion)), __LINE__);
        }
        if (is_null($securityQuestion) || (is_array($securityQuestion) && empty($securityQuestion))) {
            unset($this->SecurityQuestion);
        } else {
            $this->SecurityQuestion = $securityQuestion;
        }
        return $this;
    }
    /**
     * Get SecurityAnswer value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSecurityAnswer()
    {
        return isset($this->SecurityAnswer) ? $this->SecurityAnswer : null;
    }
    /**
     * Set SecurityAnswer value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $securityAnswer
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setSecurityAnswer($securityAnswer = null)
    {
        // validation for constraint: string
        if (!is_null($securityAnswer) && !is_string($securityAnswer)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($securityAnswer)), __LINE__);
        }
        if (is_null($securityAnswer) || (is_array($securityAnswer) && empty($securityAnswer))) {
            unset($this->SecurityAnswer);
        } else {
            $this->SecurityAnswer = $securityAnswer;
        }
        return $this;
    }
    /**
     * Get SSN value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSSN()
    {
        return isset($this->SSN) ? $this->SSN : null;
    }
    /**
     * Set SSN value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $sSN
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setSSN($sSN = null)
    {
        // validation for constraint: string
        if (!is_null($sSN) && !is_string($sSN)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($sSN)), __LINE__);
        }
        if (is_null($sSN) || (is_array($sSN) && empty($sSN))) {
            unset($this->SSN);
        } else {
            $this->SSN = $sSN;
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
     * Get AccountType value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getAccountType()
    {
        return isset($this->AccountType) ? $this->AccountType : null;
    }
    /**
     * Set AccountType value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $accountType
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setAccountType($accountType = null)
    {
        // validation for constraint: int
        if (!is_null($accountType) && !is_numeric($accountType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($accountType)), __LINE__);
        }
        if (is_null($accountType) || (is_array($accountType) && empty($accountType))) {
            unset($this->AccountType);
        } else {
            $this->AccountType = $accountType;
        }
        return $this;
    }
    /**
     * Get RepID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getRepID()
    {
        return isset($this->RepID) ? $this->RepID : null;
    }
    /**
     * Set RepID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $repID
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setRepID($repID = null)
    {
        // validation for constraint: string
        if (!is_null($repID) && !is_string($repID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($repID)), __LINE__);
        }
        if (is_null($repID) || (is_array($repID) && empty($repID))) {
            unset($this->RepID);
        } else {
            $this->RepID = $repID;
        }
        return $this;
    }
    /**
     * Get ResellerID value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return int|null
     */
    public function getResellerID()
    {
        return isset($this->ResellerID) ? $this->ResellerID : null;
    }
    /**
     * Set ResellerID value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param int $resellerID
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setResellerID($resellerID = null)
    {
        // validation for constraint: int
        if (!is_null($resellerID) && !is_numeric($resellerID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($resellerID)), __LINE__);
        }
        if (is_null($resellerID) || (is_array($resellerID) && empty($resellerID))) {
            unset($this->ResellerID);
        } else {
            $this->ResellerID = $resellerID;
        }
        return $this;
    }
    /**
     * Get PlanCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPlanCode()
    {
        return isset($this->PlanCode) ? $this->PlanCode : null;
    }
    /**
     * Set PlanCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $planCode
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setPlanCode($planCode = null)
    {
        // validation for constraint: string
        if (!is_null($planCode) && !is_string($planCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($planCode)), __LINE__);
        }
        if (is_null($planCode) || (is_array($planCode) && empty($planCode))) {
            unset($this->PlanCode);
        } else {
            $this->PlanCode = $planCode;
        }
        return $this;
    }
    /**
     * Get ContactId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getContactId()
    {
        return isset($this->ContactId) ? $this->ContactId : null;
    }
    /**
     * Set ContactId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $contactId
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setContactId($contactId = null)
    {
        // validation for constraint: string
        if (!is_null($contactId) && !is_string($contactId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($contactId)), __LINE__);
        }
        if (is_null($contactId) || (is_array($contactId) && empty($contactId))) {
            unset($this->ContactId);
        } else {
            $this->ContactId = $contactId;
        }
        return $this;
    }
    /**
     * Get OpportunityId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOpportunityId()
    {
        return isset($this->OpportunityId) ? $this->OpportunityId : null;
    }
    /**
     * Set OpportunityId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $opportunityId
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setOpportunityId($opportunityId = null)
    {
        // validation for constraint: string
        if (!is_null($opportunityId) && !is_string($opportunityId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($opportunityId)), __LINE__);
        }
        if (is_null($opportunityId) || (is_array($opportunityId) && empty($opportunityId))) {
            unset($this->OpportunityId);
        } else {
            $this->OpportunityId = $opportunityId;
        }
        return $this;
    }
    /**
     * Get CampaignId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCampaignId()
    {
        return isset($this->CampaignId) ? $this->CampaignId : null;
    }
    /**
     * Set CampaignId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $campaignId
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setCampaignId($campaignId = null)
    {
        // validation for constraint: string
        if (!is_null($campaignId) && !is_string($campaignId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($campaignId)), __LINE__);
        }
        if (is_null($campaignId) || (is_array($campaignId) && empty($campaignId))) {
            unset($this->CampaignId);
        } else {
            $this->CampaignId = $campaignId;
        }
        return $this;
    }
    /**
     * Get AgentId value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getAgentId()
    {
        return isset($this->AgentId) ? $this->AgentId : null;
    }
    /**
     * Set AgentId value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $agentId
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setAgentId($agentId = null)
    {
        // validation for constraint: string
        if (!is_null($agentId) && !is_string($agentId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($agentId)), __LINE__);
        }
        if (is_null($agentId) || (is_array($agentId) && empty($agentId))) {
            unset($this->AgentId);
        } else {
            $this->AgentId = $agentId;
        }
        return $this;
    }
    /**
     * Get CreatedBy value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCreatedBy()
    {
        return isset($this->CreatedBy) ? $this->CreatedBy : null;
    }
    /**
     * Set CreatedBy value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $createdBy
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
     */
    public function setCreatedBy($createdBy = null)
    {
        // validation for constraint: string
        if (!is_null($createdBy) && !is_string($createdBy)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($createdBy)), __LINE__);
        }
        if (is_null($createdBy) || (is_array($createdBy) && empty($createdBy))) {
            unset($this->CreatedBy);
        } else {
            $this->CreatedBy = $createdBy;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\CreateRetailAccountInput
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
