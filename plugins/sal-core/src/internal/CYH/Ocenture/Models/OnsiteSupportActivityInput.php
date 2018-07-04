<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OnsiteSupportActivityInput Models
 * @subpackage Structs
 */
class OnsiteSupportActivityInput extends AbstractStructBase
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
     * Constructor method for OnsiteSupportActivityInput
     * @uses OnsiteSupportActivityInput::setClientID()
     * @uses OnsiteSupportActivityInput::setClientMemberID()
     * @uses OnsiteSupportActivityInput::setMembershipID()
     * @param int $clientID
     * @param string $clientMemberID
     * @param int $membershipID
     */
    public function __construct($clientID = null, $clientMemberID = null, $membershipID = null)
    {
        $this
            ->setClientID($clientID)
            ->setClientMemberID($clientMemberID)
            ->setMembershipID($membershipID);
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
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityInput
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
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityInput
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
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityInput
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
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityInput
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
