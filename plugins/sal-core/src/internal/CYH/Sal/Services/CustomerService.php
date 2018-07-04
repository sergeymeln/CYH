<?php


namespace CYH\Sal\Services;


use CYH\Models\Core\Result;
use CYH\Models\Core\ResultCodes;
use CYH\Models\RG\Login;
use CYH\Models\RG\LoginResult;
use CYH\Models\RG\Registration;
use CYH\Models\RG\RegistrationResult;
use CYH\Models\RG\UserProfile;
use CYH\Models\Cache\CacheSettings;
use CYH\Sal\Services\Base\BaseService;

class CustomerService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function RegisterRGAccount(Registration $registration, $groupId): Result
    {
        if (!$registration->CreateAccountExplicitly)
        {
            $registration->Password = $registration->Zip;
            $registration->ConfirmPassword = $registration->Zip;
        }

        $result = $this->RegisterRGAccountByEmailAndPassword($registration, $groupId);
        return $result;
    }

    public function RegisterRGAccountByEmailAndPassword(Registration $registration, $groupId): Result
    {
        $result = $this->_salConnector->CreateCustomer($registration, $groupId);
        if($result->Status == ResultCodes::SUCCESS)
        {
            $result->Data = RegistrationResult::CreateFromArray($result->Data);
        }

        return $result;
    }

    public function RegisterRGAccountByEmailAndZip(Registration $registration, $groupId): Result
    {
        $result = $this->_salConnector->CreateCustomerByZip($registration, $groupId);
        if($result->Status == ResultCodes::SUCCESS)
        {
            $result->Data = RegistrationResult::CreateFromArray($result->Data);
        }

        return $result;
    }

    public function LoginRGAccount(Login $login, $groupId): Result
    {
        $result = $this->_salConnector->CheckLogin($login, $groupId);
        if($result->Status == ResultCodes::SUCCESS)
        {
            $result->Data = $this->CreateLoginResult($result->Data) ;
        }

        return $result;
    }

    /*
     * @return UserProfile|null
     * */
    public function GetUserProfile($accessToken, $groupId, CacheSettings $cacheSettings)
    {
        $res = $this->_salConnector->GetUserProfile($accessToken, $groupId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS)
        {
            return UserProfile::CreateFromArray($res->Data);
        }

        return null;
    }

    public function GetTokenByCrossPortalToken($cpt, $groupId): Result
    {
        $result = $this->_salConnector->GetTokenByCrossPortalToken($cpt, $groupId);
        if ($result->Status == ResultCodes::SUCCESS)
        {
            $result->Data = $this->CreateLoginResult($result->Data);
        }

        return $result;
    }

    public function LogoutRGAccount($accessToken, $groupId): Result
    {
        return $this->_salConnector->LogoutCustomer($accessToken, $groupId);
    }

    protected function CreateLoginResult(array $data): LoginResult
    {
        $loginResult = new LoginResult();
        $loginResult->UserName = $data['userName'];
        $loginResult->AccessToken = $data['access_token'];
        $loginResult->CrossPortalToken = $data['cross_portal_token'];

        return $loginResult;
    }
}