<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Cancel Repositories
 * @subpackage Services
 */
class Cancel extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named CancelAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to cancel an existing account.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\CancelAccountInput $cancelAccountInfo
     * @return \CYH\Ocenture\Models\CancelAccountOutput|bool
     */
    public function CancelAccount(\CYH\Ocenture\Models\CancelAccountInput $cancelAccountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->CancelAccount($cancelAccountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\CancelAccountOutput
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
