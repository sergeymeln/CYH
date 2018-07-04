<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Remote Repositories
 * @subpackage Services
 */
class Remote extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named RemoteSupportActivity
     * Meta informations extracted from the WSDL
     * - documentation: This function is used to retrieve all remote support activity data about a specific order
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\RemoteSupportActivityInput $remoteSupportActivityInfo
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData[]|bool
     */
    public function RemoteSupportActivity(\CYH\Ocenture\Models\RemoteSupportActivityInput $remoteSupportActivityInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->RemoteSupportActivity($remoteSupportActivityInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\RemoteSupportActivityData[]
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
