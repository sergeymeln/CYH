<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OnsiteSupportActivityData Models
 * @subpackage Structs
 */
class OnsiteSupportActivityData extends AbstractStructBase
{
    /**
     * The CaseID
     * @var int
     */
    public $CaseID;
    /**
     * The SkuName
     * @var string
     */
    public $SkuName;
    /**
     * The SkuPrice
     * @var float
     */
    public $SkuPrice;
    /**
     * The Purchased
     * @var string
     */
    public $Purchased;
    /**
     * The Scheduled
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var string
     */
    public $Scheduled;
    /**
     * The Completed
     * @var bool
     */
    public $Completed;
    /**
     * The Issue
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Issue;
    /**
     * The Notes
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $Notes;
    /**
     * The Contact
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $Contact;
    /**
     * The LocationName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationName;
    /**
     * The LocationAddress1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationAddress1;
    /**
     * The LocationAddress2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationAddress2;
    /**
     * The LocationCity
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationCity;
    /**
     * The LocationState
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationState;
    /**
     * The LocationZip
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationZip;
    /**
     * The LocationPhone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationPhone;
    /**
     * The LocationType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $LocationType;
    /**
     * Constructor method for OnsiteSupportActivityData
     * @uses OnsiteSupportActivityData::setCaseID()
     * @uses OnsiteSupportActivityData::setSkuName()
     * @uses OnsiteSupportActivityData::setSkuPrice()
     * @uses OnsiteSupportActivityData::setPurchased()
     * @uses OnsiteSupportActivityData::setScheduled()
     * @uses OnsiteSupportActivityData::setCompleted()
     * @uses OnsiteSupportActivityData::setIssue()
     * @uses OnsiteSupportActivityData::setNotes()
     * @uses OnsiteSupportActivityData::setContact()
     * @uses OnsiteSupportActivityData::setLocationName()
     * @uses OnsiteSupportActivityData::setLocationAddress1()
     * @uses OnsiteSupportActivityData::setLocationAddress2()
     * @uses OnsiteSupportActivityData::setLocationCity()
     * @uses OnsiteSupportActivityData::setLocationState()
     * @uses OnsiteSupportActivityData::setLocationZip()
     * @uses OnsiteSupportActivityData::setLocationPhone()
     * @uses OnsiteSupportActivityData::setLocationType()
     * @param int $caseID
     * @param string $skuName
     * @param float $skuPrice
     * @param string $purchased
     * @param string $scheduled
     * @param bool $completed
     * @param string $issue
     * @param string $notes
     * @param string $contact
     * @param string $locationName
     * @param string $locationAddress1
     * @param string $locationAddress2
     * @param string $locationCity
     * @param string $locationState
     * @param string $locationZip
     * @param string $locationPhone
     * @param string $locationType
     */
    public function __construct($caseID = null, $skuName = null, $skuPrice = null, $purchased = null, $scheduled = null, $completed = null, $issue = null, $notes = null, $contact = null, $locationName = null, $locationAddress1 = null, $locationAddress2 = null, $locationCity = null, $locationState = null, $locationZip = null, $locationPhone = null, $locationType = null)
    {
        $this
            ->setCaseID($caseID)
            ->setSkuName($skuName)
            ->setSkuPrice($skuPrice)
            ->setPurchased($purchased)
            ->setScheduled($scheduled)
            ->setCompleted($completed)
            ->setIssue($issue)
            ->setNotes($notes)
            ->setContact($contact)
            ->setLocationName($locationName)
            ->setLocationAddress1($locationAddress1)
            ->setLocationAddress2($locationAddress2)
            ->setLocationCity($locationCity)
            ->setLocationState($locationState)
            ->setLocationZip($locationZip)
            ->setLocationPhone($locationPhone)
            ->setLocationType($locationType);
    }
    /**
     * Get CaseID value
     * @return int|null
     */
    public function getCaseID()
    {
        return $this->CaseID;
    }
    /**
     * Set CaseID value
     * @param int $caseID
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setCaseID($caseID = null)
    {
        // validation for constraint: int
        if (!is_null($caseID) && !is_numeric($caseID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($caseID)), __LINE__);
        }
        $this->CaseID = $caseID;
        return $this;
    }
    /**
     * Get SkuName value
     * @return string|null
     */
    public function getSkuName()
    {
        return $this->SkuName;
    }
    /**
     * Set SkuName value
     * @param string $skuName
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setSkuName($skuName = null)
    {
        // validation for constraint: string
        if (!is_null($skuName) && !is_string($skuName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($skuName)), __LINE__);
        }
        $this->SkuName = $skuName;
        return $this;
    }
    /**
     * Get SkuPrice value
     * @return float|null
     */
    public function getSkuPrice()
    {
        return $this->SkuPrice;
    }
    /**
     * Set SkuPrice value
     * @param float $skuPrice
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setSkuPrice($skuPrice = null)
    {
        $this->SkuPrice = $skuPrice;
        return $this;
    }
    /**
     * Get Purchased value
     * @return string|null
     */
    public function getPurchased()
    {
        return $this->Purchased;
    }
    /**
     * Set Purchased value
     * @param string $purchased
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setPurchased($purchased = null)
    {
        // validation for constraint: string
        if (!is_null($purchased) && !is_string($purchased)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($purchased)), __LINE__);
        }
        $this->Purchased = $purchased;
        return $this;
    }
    /**
     * Get Scheduled value
     * @return string|null
     */
    public function getScheduled()
    {
        return $this->Scheduled;
    }
    /**
     * Set Scheduled value
     * @param string $scheduled
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setScheduled($scheduled = null)
    {
        // validation for constraint: string
        if (!is_null($scheduled) && !is_string($scheduled)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($scheduled)), __LINE__);
        }
        $this->Scheduled = $scheduled;
        return $this;
    }
    /**
     * Get Completed value
     * @return bool|null
     */
    public function getCompleted()
    {
        return $this->Completed;
    }
    /**
     * Set Completed value
     * @param bool $completed
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setCompleted($completed = null)
    {
        // validation for constraint: boolean
        if (!is_null($completed) && !is_bool($completed)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($completed)), __LINE__);
        }
        $this->Completed = $completed;
        return $this;
    }
    /**
     * Get Issue value
     * @return string|null
     */
    public function getIssue()
    {
        return $this->Issue;
    }
    /**
     * Set Issue value
     * @param string $issue
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setIssue($issue = null)
    {
        // validation for constraint: string
        if (!is_null($issue) && !is_string($issue)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($issue)), __LINE__);
        }
        $this->Issue = $issue;
        return $this;
    }
    /**
     * Get Notes value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getNotes()
    {
        return isset($this->Notes) ? $this->Notes : null;
    }
    /**
     * Set Notes value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $notes
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setNotes($notes = null)
    {
        // validation for constraint: string
        if (!is_null($notes) && !is_string($notes)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($notes)), __LINE__);
        }
        if (is_null($notes) || (is_array($notes) && empty($notes))) {
            unset($this->Notes);
        } else {
            $this->Notes = $notes;
        }
        return $this;
    }
    /**
     * Get Contact value
     * @return string|null
     */
    public function getContact()
    {
        return $this->Contact;
    }
    /**
     * Set Contact value
     * @param string $contact
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setContact($contact = null)
    {
        // validation for constraint: string
        if (!is_null($contact) && !is_string($contact)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($contact)), __LINE__);
        }
        $this->Contact = $contact;
        return $this;
    }
    /**
     * Get LocationName value
     * @return string|null
     */
    public function getLocationName()
    {
        return $this->LocationName;
    }
    /**
     * Set LocationName value
     * @param string $locationName
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationName($locationName = null)
    {
        // validation for constraint: string
        if (!is_null($locationName) && !is_string($locationName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationName)), __LINE__);
        }
        $this->LocationName = $locationName;
        return $this;
    }
    /**
     * Get LocationAddress1 value
     * @return string|null
     */
    public function getLocationAddress1()
    {
        return $this->LocationAddress1;
    }
    /**
     * Set LocationAddress1 value
     * @param string $locationAddress1
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationAddress1($locationAddress1 = null)
    {
        // validation for constraint: string
        if (!is_null($locationAddress1) && !is_string($locationAddress1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationAddress1)), __LINE__);
        }
        $this->LocationAddress1 = $locationAddress1;
        return $this;
    }
    /**
     * Get LocationAddress2 value
     * @return string|null
     */
    public function getLocationAddress2()
    {
        return $this->LocationAddress2;
    }
    /**
     * Set LocationAddress2 value
     * @param string $locationAddress2
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationAddress2($locationAddress2 = null)
    {
        // validation for constraint: string
        if (!is_null($locationAddress2) && !is_string($locationAddress2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationAddress2)), __LINE__);
        }
        $this->LocationAddress2 = $locationAddress2;
        return $this;
    }
    /**
     * Get LocationCity value
     * @return string|null
     */
    public function getLocationCity()
    {
        return $this->LocationCity;
    }
    /**
     * Set LocationCity value
     * @param string $locationCity
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationCity($locationCity = null)
    {
        // validation for constraint: string
        if (!is_null($locationCity) && !is_string($locationCity)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationCity)), __LINE__);
        }
        $this->LocationCity = $locationCity;
        return $this;
    }
    /**
     * Get LocationState value
     * @return string|null
     */
    public function getLocationState()
    {
        return $this->LocationState;
    }
    /**
     * Set LocationState value
     * @param string $locationState
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationState($locationState = null)
    {
        // validation for constraint: string
        if (!is_null($locationState) && !is_string($locationState)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationState)), __LINE__);
        }
        $this->LocationState = $locationState;
        return $this;
    }
    /**
     * Get LocationZip value
     * @return string|null
     */
    public function getLocationZip()
    {
        return $this->LocationZip;
    }
    /**
     * Set LocationZip value
     * @param string $locationZip
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationZip($locationZip = null)
    {
        // validation for constraint: string
        if (!is_null($locationZip) && !is_string($locationZip)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationZip)), __LINE__);
        }
        $this->LocationZip = $locationZip;
        return $this;
    }
    /**
     * Get LocationPhone value
     * @return string|null
     */
    public function getLocationPhone()
    {
        return $this->LocationPhone;
    }
    /**
     * Set LocationPhone value
     * @param string $locationPhone
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationPhone($locationPhone = null)
    {
        // validation for constraint: string
        if (!is_null($locationPhone) && !is_string($locationPhone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationPhone)), __LINE__);
        }
        $this->LocationPhone = $locationPhone;
        return $this;
    }
    /**
     * Get LocationType value
     * @return string|null
     */
    public function getLocationType()
    {
        return $this->LocationType;
    }
    /**
     * Set LocationType value
     * @param string $locationType
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
     */
    public function setLocationType($locationType = null)
    {
        // validation for constraint: string
        if (!is_null($locationType) && !is_string($locationType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($locationType)), __LINE__);
        }
        $this->LocationType = $locationType;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData
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
