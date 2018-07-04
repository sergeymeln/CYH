<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetUserStatusInput Models
 * @subpackage Structs
 */
class GetUserStatusInput extends AbstractStructBase
{
    /**
     * The ClientMemberID
     * @var string
     */
    public $ClientMemberID;
    /**
     * The MembershipID
     * @var int
     */
    public $MembershipID;
    /**
     * Constructor method for GetUserStatusInput
     * @uses GetUserStatusInput::setClientMemberID()
     * @uses GetUserStatusInput::setMembershipID()
     * @param string $clientMemberID
     * @param int $membershipID
     */
    public function __construct($clientMemberID = null, $membershipID = null)
    {
        $this
            ->setClientMemberID($clientMemberID)
            ->setMembershipID($membershipID);
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
     * @return \CYH\Ocenture\Models\GetUserStatusInput
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
     * @return int|null
     */
    public function getMembershipID()
    {
        return $this->MembershipID;
    }
    /**
     * Set MembershipID value
     * @param int $membershipID
     * @return \CYH\Ocenture\Models\GetUserStatusInput
     */
    public function setMembershipID($membershipID = null)
    {
        // validation for constraint: int
        if (!is_null($membershipID) && !is_numeric($membershipID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($membershipID)), __LINE__);
        }
        $this->MembershipID = $membershipID;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\GetUserStatusInput
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
