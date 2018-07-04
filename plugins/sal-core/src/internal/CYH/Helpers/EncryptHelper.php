<?php


namespace CYH\Helpers;


use phpseclib\Crypt\AES;

class EncryptHelper
{
    //Encrypts $sData and returns base64-encoded representation of string
    public static function EncryptAES($sIV, $sKey, $iBit, $sData)
    {
        $oCipher = new AES(AES::MODE_CBC);
        // keys are null-padded to the closest valid size
        // longer than the longest key and it's truncated
        $oCipher->setKeyLength($iBit);
        $oCipher->setKey($sKey);
        $oCipher->setIV($sIV);

        return base64_encode($oCipher->encrypt($sData));
    }

    public static function DecryptAES($sIV, $sKey, $iBit, $sData)
    {
        $cipher = new AES(AES::MODE_CBC);
        // keys are null-padded to the closest valid size
        // longer than the longest key and it's truncated
        $cipher->setKeyLength($iBit);
        $cipher->setKey($sKey);
        $cipher->setIV($sIV);

        return  $cipher->decrypt(base64_decode($sData));
    }

    public static function ConvertStringToHex($inputStr) {
        if (strlen($inputStr) > 0) {
            $mLitters = str_split($inputStr, 2);

            if (count($mLitters)) {
                $outputStr = '';
                foreach ($mLitters as $element) {
                    $outputStr .= chr(hexdec($element));
                }

                return $outputStr;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}