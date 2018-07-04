<?php

namespace CYH\Ocenture\Models;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for CheckUsernameOutput Models
 * @subpackage Structs
 */
class CheckUsernameOutput extends AbstractStructBase
{
    /**
     * The Status
     * @var int
     */
    public $Status;
    /**
     * Constructor method for CheckUsernameOutput
     * @uses CheckUsernameOutput::setStatus()
     * @param int $status
     */
    public function __construct($status = null)
    {
        $this
            ->setStatus($status);
    }
    /**
     * Get Status value
     * @return int|null
     */
    public function getStatus()
    {
        return $this->Status;
    }
    /**
     * Set Status value
     * @param int $status
     * @return \CYH\Ocenture\Models\CheckUsernameOutput
     */
    public function setStatus($status = null)
    {
        // validation for constraint: int
        if (!is_null($status) && !is_numeric($status)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($status)), __LINE__);
        }
        $this->Status = $status;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \CYH\Ocenture\Models\CheckUsernameOutput
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
