<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for UMSI Repositories
 * @subpackage Services
 */
class UMSI extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named UMSInsert
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to insert a new user in Unified Messages Downline. (This must be done before the CreateAccount call)
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\UMSInsertInput $uMSInsertInfo
     * @return \CYH\Ocenture\Models\UMSInsertOutput|bool
     */
    public function UMSInsert(\CYH\Ocenture\Models\UMSInsertInput $uMSInsertInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->UMSInsert($uMSInsertInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\UMSInsertOutput
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
