<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Create Repositories
 * @subpackage Services
 */
class Create extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named CreateAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to create an account with Ocenture. Upon successful completion of this operation, the account owner will be able to start using Ocenture services.If the operation is successful it returns your unique
     * identifier (ClientMemberID), Ocenture unique identifier (MembershipID) and product code (ProductCode) .
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\CreateAccountInput $accountInfo
     * @return \CYH\Ocenture\Models\CreateAccountOutput|bool
     */
    public function CreateAccount(\CYH\Ocenture\Models\CreateAccountInput $accountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->CreateAccount($accountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named CreateRetailAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to create a Retail account with Ocenture (billed by Ocenture with payment details provided via UpdatePaymentInfo method). Upon successful completion of this operation, an incomplete/inactive order will be
     * created and it will return your unique identifier (ClientMemberID), Ocenture unique identifier (MembershipID) and product code (ProductCode). Order activation will require the successful completion of an UpdatePaymentInfo method using this response
     * data plus additional attributes as described in that method.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\CreateRetailAccountInput $accountInfo
     * @return \CYH\Ocenture\Models\CreateRetailAccountOutput|bool
     */
    public function CreateRetailAccount(\CYH\Ocenture\Models\CreateRetailAccountInput $accountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->CreateRetailAccount($accountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\CreateAccountOutput|\CYH\Ocenture\Models\CreateRetailAccountOutput
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
