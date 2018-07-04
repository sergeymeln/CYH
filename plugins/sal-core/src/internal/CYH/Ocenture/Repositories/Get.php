<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Get Repositories
 * @subpackage Services
 */
class Get extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named GetAVASKey
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to retrieve an antivirus key or produce a new antivirus key. The submitted MembershipID will be validated to ensure an active computer protection benefit. Upon successful verification, the method will
     * retrieve the existing antivirus key or create a new antivirus key.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\GetAVASKeyInput $getAVASKeyInfo
     * @return \CYH\Ocenture\Models\GetAVASKeyOutput|bool
     */
    public function GetAVASKey(\CYH\Ocenture\Models\GetAVASKeyInput $getAVASKeyInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->GetAVASKey($getAVASKeyInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetUserStatus
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to return a status indicating the the usuage state for the specified product account.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\GetUserStatusInput $getUserStatusInfo
     * @return \CYH\Ocenture\Models\GetUserStatusOutput|bool
     */
    public function GetUserStatus(\CYH\Ocenture\Models\GetUserStatusInput $getUserStatusInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->GetUserStatus($getUserStatusInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\GetAVASKeyOutput|\CYH\Ocenture\Models\GetUserStatusOutput
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
