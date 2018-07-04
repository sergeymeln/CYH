<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UpdatePaymentInfoInput Models
 * @subpackage Structs
 */
class UpdatePaymentInfoInput extends AbstractStructBase
{
    /**
     * The ClientMemberID
     * @var string
     */
    public $ClientMemberID;
    /**
     * The ClientID
     * @var int
     */
    public $ClientID;
    /**
     * The MembershipID
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var int
     */
    public $MembershipID;
    /**
     * The NameOnCard
     * @var string
     */
    public $NameOnCard;
    /**
     * The PaymentDetails
     * @var string
     */
    public $PaymentDetails;
    /**
     * The ModifiedBy
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ModifiedBy;
    /**
     * Constructor method for UpdatePaymentInfoInput
     * @uses UpdatePaymentInfoInput::setClientMemberID()
     * @uses UpdatePaymentInfoInput::setClientID()
     * @uses UpdatePaymentInfoInput::setMembershipID()
     * @uses UpdatePaymentInfoInput::setNameOnCard()
     * @uses UpdatePaymentInfoInput::setPaymentDetails()
     * @uses UpdatePaymentInfoInput::setModifiedBy()
     * @param string $clientMemberID
     * @param int $clientID
     * @param int $membershipID
     * @param string $nameOnCard
     * @param string $paymentDetails
     * @param string $modifiedBy
     */
    public function __construct($clientMemberID = null, $clientID = null, $membershipID = null, $nameOnCard = null, $paymentDetails = null, $modifiedBy = null)
    {
        $this
            ->setClientMemberID($clientMemberID)
            ->setClientID($clientID)
            ->setMembershipID($membershipID)
            ->setNameOnCard($nameOnCard)
            ->setPaymentDetails($paymentDetails)
            ->setModifiedBy($modifiedBy);
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
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
     * Get NameOnCard value
     * @return string|null
     */
    public function getNameOnCard()
    {
        return $this->NameOnCard;
    }
    /**
     * Set NameOnCard value
     * @param string $nameOnCard
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
     */
    public function setNameOnCard($nameOnCard = null)
    {
        // validation for constraint: string
        if (!is_null($nameOnCard) && !is_string($nameOnCard)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($nameOnCard)), __LINE__);
        }
        $this->NameOnCard = $nameOnCard;
        return $this;
    }
    /**
     * Get PaymentDetails value
     * @return string|null
     */
    public function getPaymentDetails()
    {
        return $this->PaymentDetails;
    }
    /**
     * Set PaymentDetails value
     * @param string $paymentDetails
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
     */
    public function setPaymentDetails($paymentDetails = null)
    {
        // validation for constraint: string
        if (!is_null($paymentDetails) && !is_string($paymentDetails)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($paymentDetails)), __LINE__);
        }
        $this->PaymentDetails = $paymentDetails;
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
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
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoInput
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
