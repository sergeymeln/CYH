<?php


namespace CYH\RG\Services;


use CYH\Helpers\EncryptHelper;
use CYH\Models\Authentication\Principal;
use CYH\Models\Encryption\AESSettings;
use CYH\Models\RG\LoginResult;

class AuthenticationService
{
    protected $_encryptionSettings;

    public function __construct(AESSettings $encSettings)
    {
        $this->_encryptionSettings = $encSettings;
    }

    public function CreateAuthTicket(LoginResult $login, int $groupId): string
    {
        $iv = EncryptHelper::ConvertStringToHex($this->_encryptionSettings->Iv);
        $key = EncryptHelper::ConvertStringToHex($this->_encryptionSettings->Key);

        $principal = new Principal();
        $principal->GroupId = $groupId;
        $principal->AccessToken = $login->AccessToken;
        $principal->UserName = $login->UserName;
        $principal->CrossPortalToken = $login->CrossPortalToken;

        $serializedPrincipal = json_encode($principal);

        return EncryptHelper::EncryptAES($iv, $key, $this->_encryptionSettings->BitValue, $serializedPrincipal);
    }

    public function DecodeAuthTicket($ticketData): Principal
    {
        $iv = EncryptHelper::ConvertStringToHex($this->_encryptionSettings->Iv);
        $key = EncryptHelper::ConvertStringToHex($this->_encryptionSettings->Key);

        $decodeResult = EncryptHelper::DecryptAES($iv, $key, $this->_encryptionSettings->BitValue, $ticketData);
        $principal = Principal::CreateFromArray(json_decode($decodeResult, true));

        return $principal;
    }
}