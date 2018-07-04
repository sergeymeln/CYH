<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Onsite Repositories
 * @subpackage Services
 */
class Onsite extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named OnsiteSupportActivity
     * Meta informations extracted from the WSDL
     * - documentation: This function is used to retrieve all remote support activity data about a specific order
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\OnsiteSupportActivityInput $onsiteSupportActivityInfo
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData[]|bool
     */
    public function OnsiteSupportActivity(\CYH\Ocenture\Models\OnsiteSupportActivityInput $onsiteSupportActivityInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->OnsiteSupportActivity($onsiteSupportActivityInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\OnsiteSupportActivityData[]
     */
    public function getResult()
    {
        return parent::getResult();
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
