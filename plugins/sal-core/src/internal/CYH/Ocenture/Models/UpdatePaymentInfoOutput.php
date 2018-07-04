<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UpdatePaymentInfoOutput Models
 * @subpackage Structs
 */
class UpdatePaymentInfoOutput extends AbstractStructBase
{
    /**
     * The Status
     * @var string
     */
    public $Status;
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
     * Constructor method for UpdatePaymentInfoOutput
     * @uses UpdatePaymentInfoOutput::setStatus()
     * @uses UpdatePaymentInfoOutput::setClientMemberID()
     * @uses UpdatePaymentInfoOutput::setMembershipID()
     * @param string $status
     * @param string $clientMemberID
     * @param int $membershipID
     */
    public function __construct($status = null, $clientMemberID = null, $membershipID = null)
    {
        $this
            ->setStatus($status)
            ->setClientMemberID($clientMemberID)
            ->setMembershipID($membershipID);
    }
    /**
     * Get Status value
     * @return string|null
     */
    public function getStatus()
    {
        return $this->Status;
    }
    /**
     * Set Status value
     * @param string $status
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoOutput
     */
    public function setStatus($status = null)
    {
        // validation for constraint: string
        if (!is_null($status) && !is_string($status)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($status)), __LINE__);
        }
        $this->Status = $status;
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoOutput
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoOutput
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoOutput
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
