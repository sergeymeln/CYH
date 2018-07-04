<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetAVASKeyInput Models
 * @subpackage Structs
 */
class GetAVASKeyInput extends AbstractStructBase
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
     * The SeqNumber
     * @var string
     */
    public $SeqNumber;
    /**
     * The ModifiedBy
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $ModifiedBy;
    /**
     * Constructor method for GetAVASKeyInput
     * @uses GetAVASKeyInput::setClientMemberID()
     * @uses GetAVASKeyInput::setMembershipID()
     * @uses GetAVASKeyInput::setSeqNumber()
     * @uses GetAVASKeyInput::setModifiedBy()
     * @param string $clientMemberID
     * @param int $membershipID
     * @param string $seqNumber
     * @param string $modifiedBy
     */
    public function __construct($clientMemberID = null, $membershipID = null, $seqNumber = null, $modifiedBy = null)
    {
        $this
            ->setClientMemberID($clientMemberID)
            ->setMembershipID($membershipID)
            ->setSeqNumber($seqNumber)
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
     * @return \CYH\Ocenture\Models\GetAVASKeyInput
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
     * @return \CYH\Ocenture\Models\GetAVASKeyInput
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
     * Get SeqNumber value
     * @return string|null
     */
    public function getSeqNumber()
    {
        return $this->SeqNumber;
    }
    /**
     * Set SeqNumber value
     * @param string $seqNumber
     * @return \CYH\Ocenture\Models\GetAVASKeyInput
     */
    public function setSeqNumber($seqNumber = null)
    {
        // validation for constraint: string
        if (!is_null($seqNumber) && !is_string($seqNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($seqNumber)), __LINE__);
        }
        $this->SeqNumber = $seqNumber;
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
     * @return \CYH\Ocenture\Models\GetAVASKeyInput
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
     * @return \CYH\Ocenture\Models\GetAVASKeyInput
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
