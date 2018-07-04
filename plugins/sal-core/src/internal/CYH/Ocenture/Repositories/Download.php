<?php

namespace CYH\Ocenture\Repositories;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Download Repositories
 * @subpackage Services
 */
class Download extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named DownloadAVAS
     * Meta informations extracted from the WSDL
     * - documentation: This operation can be used to fulfill an antivirus software request. The submitted MembershipID, if validated with an active computer protection benefit,will be sent an email containing a license key, installation instructions, and a
     * product brochure. This will be sent to the email address on file.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \CYH\Ocenture\Models\DownloadAVASInput $downloadAVASInfo
     * @return \CYH\Ocenture\Models\DownloadAVASOutput|bool
     */
    public function DownloadAVAS(\CYH\Ocenture\Models\DownloadAVASInput $downloadAVASInfo)
    {
        try {
            $this->setResult(self::getSoapClient()->DownloadAVAS($downloadAVASInfo));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \CYH\Ocenture\Models\DownloadAVASOutput
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
