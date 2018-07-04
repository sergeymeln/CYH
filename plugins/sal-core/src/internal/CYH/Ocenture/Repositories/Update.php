<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Update Repositories
 * @subpackage Services
 */
class Update extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named UpdatePaymentInfo
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to add or update payment details for an existing Retail order record.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\UpdatePaymentInfoInput $updatePaymentInfoInfo
     * @return \CYH\Ocenture\Models\UpdatePaymentInfoOutput|bool
     */
    public function UpdatePaymentInfo(\CYH\Ocenture\Models\UpdatePaymentInfoInput $updatePaymentInfoInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->UpdatePaymentInfo($updatePaymentInfoInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named UpdateAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to change any of the attributes of the specified account.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\UpdateAccountInput $updateAccountInfo
     * @return \CYH\Ocenture\Models\UpdateAccountOutput|bool
     */
    public function UpdateAccount(\CYH\Ocenture\Models\UpdateAccountInput $updateAccountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->UpdateAccount($updateAccountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\UpdateAccountOutput|\CYH\Ocenture\Models\UpdatePaymentInfoOutput
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
