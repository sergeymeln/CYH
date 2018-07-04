<?php


namespace CYH\Ocenture\Services;


use CYH\Models\Core\Environment;
use CYH\Models\Core\Result;
use CYH\Models\Core\ResultCodes;
use CYH\Models\Ocenture\CancelAccountModel;
use CYH\Models\Ocenture\CreateAccountModel;
use CYH\Models\Ocenture\EligibleAccountModel;
use CYH\Models\Ocenture\GetUserStatusModel;
use CYH\Models\Ocenture\ReactivateAccountModel;
use CYH\Ocenture\ClassMap;
use CYH\Ocenture\Enums\AccountType;
use CYH\Ocenture\Models\CancelAccountInput;
use CYH\Ocenture\Models\CreateAccountInput;
use CYH\Ocenture\Models\GetUserStatusInput;
use CYH\Ocenture\Models\ReactivateAccountInput;
use CYH\Ocenture\Repositories\Cancel;
use CYH\Ocenture\Repositories\Create;
use CYH\Ocenture\Repositories\Get;
use CYH\Ocenture\Repositories\Reactivate;
use CYH\WpOptionsHandlers\Pages\Ocenture\GeneralOptions;
use Ramsey\Uuid\Uuid;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

class OcentureService
{
    protected $_soapOptions;
    protected $_ocentureSettings;

    public function __construct()
    {
        $this->_ocentureSettings = GeneralOptions::GetSettings();

        $wsdlUrls = [
            Environment::TEST => 'https://ocenture.net.st1.ocenture.com/webservice/soap/AM2/?wsdl',
            Environment::LIVE => 'https://ocenture.net/webservice/soap/AM2/?wsdl'
        ];

        $this->_options = [
            AbstractSoapClientBase::WSDL_URL => $wsdlUrls[$this->_ocentureSettings['general_environment']],
            AbstractSoapClientBase::WSDL_CLASSMAP => ClassMap::get(),
        ];
    }

    public function GetClientId()
    {
        return $this->_ocentureSettings['general_client_id'];
    }

    public function CreateAccount(CreateAccountModel $account)
    {
        $repo = new Create($this->_options);
        $input = new CreateAccountInput();
        $input->setClientID($this->GetClientId())
            ->setProductCode($account->ProductCode)
            ->setClientMemberID(Uuid::uuid1()->toString())
            ->setFirstName($account->FirstName)
            ->setLastName($account->LastName)
            ->setAddress($account->Address1)
            ->setAddress2($account->Address2)
            ->setCity($account->City)
            ->setState($account->State)
            ->setZipcode($account->Zip)
            ->setPhone($account->Phone)
            ->setEmail($account->Email)
            ->setCreditCardType($account->CcType)
            ->setCreditCardNumber($account->CcNumber)
            ->setCCExpirationDate($account->CcExpMonth . $account->CcExpYear)
            ->setAccountType(AccountType::LIVE_ORDER);

        $res = new Result();
        if (($repo->CreateAccount($input)) !== false) {
            $res->SetStatus(ResultCodes::SUCCESS)
                ->SetData($repo->getResult());
        } else {
            $res->SetStatus(ResultCodes::ERROR)
                ->SetData($repo->getLastError());
        }

        return $res;
    }

    public function CancelAccount(CancelAccountModel $model)
    {
        $repo = new Cancel($this->_options);
        $input = new CancelAccountInput();
        $input->setClientMemberID($model->ClientMemberId)
            ->setClientID($model->ClientId)
            ->MembershipID($model->MembershipId);

        $res = new Result();
        if (($repo->CancelAccount($input)) !== false) {
            $res->SetStatus(ResultCodes::SUCCESS)
                ->SetData($repo->getResult());
        } else {
            $res->SetStatus(ResultCodes::ERROR)
                ->SetData($repo->getLastError());
        }

        return $res;
    }

    public function ReactivateAccount(ReactivateAccountModel $model)
    {
        $repo = new Reactivate($this->_options);
        $input = new ReactivateAccountInput();
        $input->setClientMemberID($model->ClientMemberId)
            ->MembershipID($model->MembershipId);

        $res = new Result();
        if (($repo->ReactivateAccount($input)) !== false) {
            $res->SetStatus(ResultCodes::SUCCESS)
                ->SetData($repo->getResult());
        } else {
            $res->SetStatus(ResultCodes::ERROR)
                ->SetData($repo->getLastError());
        }

        return $res;
    }

    public function GetUserStatus(GetUserStatusModel $model)
    {
        $repo = new Get($this->_options);
        $input = new GetUserStatusInput();
        $input->setClientMemberID($model->ClientMemberId)
            ->MembershipID($model->MembershipId);

        $res = new Result();
        if (($repo->CancelAccount($input)) !== false) {
            $res->SetStatus(ResultCodes::SUCCESS)
                ->SetData($repo->getResult());
        } else {
            $res->SetStatus(ResultCodes::ERROR)
                ->SetData($repo->getLastError());
        }

        return $res;
    }
}