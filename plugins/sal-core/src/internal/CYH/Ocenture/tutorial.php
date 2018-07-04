<?php
/**
 * This file aims to show you how to use this generated package.
 * In addition, the goal is to show which methods are available and the fist needed parameter(s)
 * You have to use an associative array such as:
 * - the key must be a constant beginning with WSDL_ from AbstractSoapClientbase class each generated ServiceType class extends this class
 * - the value must be the corresponding key value (each option matches a {@link http://www.php.net/manual/en/soapclient.soapclient.php} option)
 * $options = array(
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://ocenture.net.st1.ocenture.com/webservice/soap/AM2/?wsdl',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_TRACE => true,
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN => 'you_secret_login',
 * \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD => 'you_secret_password',
 * );
 * etc....
 * ################################################################################
 * Don't forget to add wsdltophp/packagebase:dev-master to your main composer.json.
 * ################################################################################
 */
/**
 * Minimal options
 */
$options = array(
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => 'https://ocenture.net.st1.ocenture.com/webservice/soap/AM2/?wsdl',
    \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => \CYH\Ocenture\ClassMap::get(),
);
/**
 * Samples for Create ServiceType
 */
$create = new \CYH\Ocenture\Repositories\Create($options);
/**
 * Sample call for CreateAccount operation/method
 */
if ($create->CreateAccount(new \CYH\Ocenture\Models\CreateAccountInput()) !== false) {
    print_r($create->getResult());
} else {
    print_r($create->getLastError());
}
/**
 * Sample call for CreateRetailAccount operation/method
 */
if ($create->CreateRetailAccount(new \CYH\Ocenture\Models\CreateRetailAccountInput()) !== false) {
    print_r($create->getResult());
} else {
    print_r($create->getLastError());
}
/**
 * Samples for Update ServiceType
 */
$update = new \CYH\Ocenture\Repositories\Update($options);
/**
 * Sample call for UpdatePaymentInfo operation/method
 */
if ($update->UpdatePaymentInfo(new \CYH\Ocenture\Models\UpdatePaymentInfoInput()) !== false) {
    print_r($update->getResult());
} else {
    print_r($update->getLastError());
}
/**
 * Sample call for UpdateAccount operation/method
 */
if ($update->UpdateAccount(new \CYH\Ocenture\Models\UpdateAccountInput()) !== false) {
    print_r($update->getResult());
} else {
    print_r($update->getLastError());
}
/**
 * Samples for Cancel ServiceType
 */
$cancel = new \CYH\Ocenture\Repositories\Cancel($options);
/**
 * Sample call for CancelAccount operation/method
 */
if ($cancel->CancelAccount(new \CYH\Ocenture\Models\CancelAccountInput()) !== false) {
    print_r($cancel->getResult());
} else {
    print_r($cancel->getLastError());
}
/**
 * Samples for Reactivate ServiceType
 */
$reactivate = new \CYH\Ocenture\Repositories\Reactivate($options);
/**
 * Sample call for ReactivateAccount operation/method
 */
if ($reactivate->ReactivateAccount(new \CYH\Ocenture\Models\ReactivateAccountInput()) !== false) {
    print_r($reactivate->getResult());
} else {
    print_r($reactivate->getLastError());
}
/**
 * Samples for Upgrade ServiceType
 */
$upgrade = new \CYH\Ocenture\Repositories\Upgrade($options);
/**
 * Sample call for UpgradeAccount operation/method
 */
if ($upgrade->UpgradeAccount(new \CYH\Ocenture\Models\UpgradeAccountInput()) !== false) {
    print_r($upgrade->getResult());
} else {
    print_r($upgrade->getLastError());
}
/**
 * Samples for Add ServiceType
 */
$add = new \CYH\Ocenture\Repositories\Add($options);
/**
 * Sample call for AddSecondaryAccount operation/method
 */
if ($add->AddSecondaryAccount(new \CYH\Ocenture\Models\AddSecondaryAccountInput()) !== false) {
    print_r($add->getResult());
} else {
    print_r($add->getLastError());
}
/**
 * Samples for Check ServiceType
 */
$check = new \CYH\Ocenture\Repositories\Check($options);
/**
 * Sample call for CheckUsername operation/method
 */
if ($check->CheckUsername(new \CYH\Ocenture\Models\CheckUsernameInput()) !== false) {
    print_r($check->getResult());
} else {
    print_r($check->getLastError());
}
/**
 * Samples for Get ServiceType
 */
$get = new \CYH\Ocenture\Repositories\Get($options);
/**
 * Sample call for GetAVASKey operation/method
 */
if ($get->GetAVASKey(new \CYH\Ocenture\Models\GetAVASKeyInput()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Sample call for GetUserStatus operation/method
 */
if ($get->GetUserStatus(new \CYH\Ocenture\Models\GetUserStatusInput()) !== false) {
    print_r($get->getResult());
} else {
    print_r($get->getLastError());
}
/**
 * Samples for Download ServiceType
 */
$download = new \CYH\Ocenture\Repositories\Download($options);
/**
 * Sample call for DownloadAVAS operation/method
 */
if ($download->DownloadAVAS(new \CYH\Ocenture\Models\DownloadAVASInput()) !== false) {
    print_r($download->getResult());
} else {
    print_r($download->getLastError());
}
/**
 * Samples for Remote ServiceType
 */
$remote = new \CYH\Ocenture\Repositories\Remote($options);
/**
 * Sample call for RemoteSupportActivity operation/method
 */
if ($remote->RemoteSupportActivity(new \CYH\Ocenture\Models\RemoteSupportActivityInput()) !== false) {
    print_r($remote->getResult());
} else {
    print_r($remote->getLastError());
}
/**
 * Samples for Onsite ServiceType
 */
$onsite = new \CYH\Ocenture\Repositories\Onsite($options);
/**
 * Sample call for OnsiteSupportActivity operation/method
 */
if ($onsite->OnsiteSupportActivity(new \CYH\Ocenture\Models\OnsiteSupportActivityInput()) !== false) {
    print_r($onsite->getResult());
} else {
    print_r($onsite->getLastError());
}
/**
 * Samples for UMSI ServiceType
 */
$uMSI = new \CYH\Ocenture\Repositories\UMSI($options);
/**
 * Sample call for UMSInsert operation/method
 */
if ($uMSI->UMSInsert(new \CYH\Ocenture\Models\UMSInsertInput()) !== false) {
    print_r($uMSI->getResult());
} else {
    print_r($uMSI->getLastError());
}
