<?php


namespace CYH\Models\Encryption;


class AESSettings
{
    public $Iv;
    public $Key;
    public $BitValue;

    public function __construct()
    {
        $this->Iv = RG_LOGIN_IV;
        $this->Key = RG_LOGIN_KEY;
        $this->BitValue = (int)DEFAULT_AES_ENCRYPTION_BIT;
    }
}