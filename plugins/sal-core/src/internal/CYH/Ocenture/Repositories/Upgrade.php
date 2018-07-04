<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Upgrade Repositories
 * @subpackage Services
 */
class Upgrade extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named UpgradeAccount
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to update a Product ID to communicate an upgrade.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\UpgradeAccountInput $upgradeAccountInfo
     * @return \CYH\Ocenture\Models\UpgradeAccountOutput|bool
     */
    public function UpgradeAccount(\CYH\Ocenture\Models\UpgradeAccountInput $upgradeAccountInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->UpgradeAccount($upgradeAccountInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\UpgradeAccountOutput
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
