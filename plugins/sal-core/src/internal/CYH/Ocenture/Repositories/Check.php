<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Check Repositories
 * @subpackage Services
 */
class Check extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named CheckUsername
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to determine if the specified Username is available for the ClientID + ProductCode submitted.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\CheckUsernameInput $checkUsernameInfo
     * @return \CYH\Ocenture\Models\CheckUsernameOutput|bool
     */
    public function CheckUsername(\CYH\Ocenture\Models\CheckUsernameInput $checkUsernameInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->CheckUsername($checkUsernameInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\CheckUsernameOutput
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
