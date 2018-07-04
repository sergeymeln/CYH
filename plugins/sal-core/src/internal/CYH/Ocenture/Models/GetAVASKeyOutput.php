<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetAVASKeyOutput Models
 * @subpackage Structs
 */
class GetAVASKeyOutput extends AbstractStructBase
{
    /**
     * The MembershipID
     * @var int
     */
    public $MembershipID;
    /**
     * The AVASLicenseKey
     * @var string
     */
    public $AVASLicenseKey;
    /**
     * The SeqNumber
     * @var string
     */
    public $SeqNumber;
    /**
     * Constructor method for GetAVASKeyOutput
     * @uses GetAVASKeyOutput::setMembershipID()
     * @uses GetAVASKeyOutput::setAVASLicenseKey()
     * @uses GetAVASKeyOutput::setSeqNumber()
     * @param int $membershipID
     * @param string $aVASLicenseKey
     * @param string $seqNumber
     */
    public function __construct($membershipID = null, $aVASLicenseKey = null, $seqNumber = null)
    {
        $this
            ->setMembershipID($membershipID)
            ->setAVASLicenseKey($aVASLicenseKey)
            ->setSeqNumber($seqNumber);
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
     * @return \CYH\Ocenture\Models\GetAVASKeyOutput
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
     * Get AVASLicenseKey value
     * @return string|null
     */
    public function getAVASLicenseKey()
    {
        return $this->AVASLicenseKey;
    }
    /**
     * Set AVASLicenseKey value
     * @param string $aVASLicenseKey
     * @return \CYH\Ocenture\Models\GetAVASKeyOutput
     */
    public function setAVASLicenseKey($aVASLicenseKey = null)
    {
        // validation for constraint: string
        if (!is_null($aVASLicenseKey) && !is_string($aVASLicenseKey)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($aVASLicenseKey)), __LINE__);
        }
        $this->AVASLicenseKey = $aVASLicenseKey;
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
     * @return \CYH\Ocenture\Models\GetAVASKeyOutput
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
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\GetAVASKeyOutput
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
