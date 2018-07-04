<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Add Repositories
 * @subpackage Services
 */
class Add extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named AddSecondaryAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to create an account with Ocenture. Upon successful completion of this operation, the account owner will be able to start using Ocenture services.If the operation is successful it returns your unique
     * identifier (ClientMemberID), Ocenture unique identifier (MembershipID) and product code (ProductCode) .
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\AddSecondaryAccountInput $accountInfo
     * @return \CYH\Ocenture\Models\AddSecondaryAccountOutput|bool
     */
    public function AddSecondaryAccount(\CYH\Ocenture\Models\AddSecondaryAccountInput $accountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->AddSecondaryAccount($accountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\AddSecondaryAccountOutput
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
