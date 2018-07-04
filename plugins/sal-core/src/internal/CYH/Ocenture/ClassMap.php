<?php

namespace CYH\Ocenture;

/**
 * Class which returns the class map definition
 * @package
 */
class ClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get()
    {
        return array(
            'CreateAccountInput' => '\\CYH\\Ocenture\\Models\\CreateAccountInput',
            'CreateAccountOutput' => '\\CYH\\Ocenture\\Models\\CreateAccountOutput',
            'CreateRetailAccountInput' => '\\CYH\\Ocenture\\Models\\CreateRetailAccountInput',
            'CreateRetailAccountOutput' => '\\CYH\\Ocenture\\Models\\CreateRetailAccountOutput',
            'UpdatePaymentInfoInput' => '\\CYH\\Ocenture\\Models\\UpdatePaymentInfoInput',
            'UpdatePaymentInfoOutput' => '\\CYH\\Ocenture\\Models\\UpdatePaymentInfoOutput',
            'CancelAccountInput' => '\\CYH\\Ocenture\\Models\\CancelAccountInput',
            'CancelAccountOutput' => '\\CYH\\Ocenture\\Models\\CancelAccountOutput',
            'ReactivateAccountInput' => '\\CYH\\Ocenture\\Models\\ReactivateAccountInput',
            'ReactivateAccountOutput' => '\\CYH\\Ocenture\\Models\\ReactivateAccountOutput',
            'UpgradeAccountInput' => '\\CYH\\Ocenture\\Models\\UpgradeAccountInput',
            'UpgradeAccountOutput' => '\\CYH\\Ocenture\\Models\\UpgradeAccountOutput',
            'AddSecondaryAccountInput' => '\\CYH\\Ocenture\\Models\\AddSecondaryAccountInput',
            'AddSecondaryAccountOutput' => '\\CYH\\Ocenture\\Models\\AddSecondaryAccountOutput',
            'CheckUsernameInput' => '\\CYH\\Ocenture\\Models\\CheckUsernameInput',
            'CheckUsernameOutput' => '\\CYH\\Ocenture\\Models\\CheckUsernameOutput',
            'UpdateAccountInput' => '\\CYH\\Ocenture\\Models\\UpdateAccountInput',
            'UpdateAccountOutput' => '\\CYH\\Ocenture\\Models\\UpdateAccountOutput',
            'GetAVASKeyInput' => '\\CYH\\Ocenture\\Models\\GetAVASKeyInput',
            'GetAVASKeyOutput' => '\\CYH\\Ocenture\\Models\\GetAVASKeyOutput',
            'DownloadAVASInput' => '\\CYH\\Ocenture\\Models\\DownloadAVASInput',
            'DownloadAVASOutput' => '\\CYH\\Ocenture\\Models\\DownloadAVASOutput',
            'RemoteSupportActivityInput' => '\\CYH\\Ocenture\\Models\\RemoteSupportActivityInput',
            'RemoteSupportActivityData' => '\\CYH\\Ocenture\\Models\\RemoteSupportActivityData',
            'OnsiteSupportActivityInput' => '\\CYH\\Ocenture\\Models\\OnsiteSupportActivityInput',
            'OnsiteSupportActivityData' => '\\CYH\\Ocenture\\Models\\OnsiteSupportActivityData',
            'UMSInsertInput' => '\\CYH\\Ocenture\\Models\\UMSInsertInput',
            'UMSInsertOutput' => '\\CYH\\Ocenture\\Models\\UMSInsertOutput',
            'GetUserStatusInput' => '\\CYH\\Ocenture\\Models\\GetUserStatusInput',
            'GetUserStatusOutput' => '\\CYH\\Ocenture\\Models\\GetUserStatusOutput',
        );
    }
}
