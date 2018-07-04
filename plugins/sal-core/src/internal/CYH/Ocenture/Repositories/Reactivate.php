<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Reactivate Repositories
 * @subpackage Services
 */
class Reactivate extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named ReactivateAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to reactivate an existing cancelled account.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\ReactivateAccountInput $reactivateAccountInfo
     * @return \CYH\Ocenture\Models\ReactivateAccountOutput|bool
     */
    public function ReactivateAccount(\CYH\Ocenture\Models\ReactivateAccountInput $reactivateAccountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->ReactivateAccount($reactivateAccountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\ReactivateAccountOutput
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
