<?php


namespace CYH\Helpers;


use CYH\Models\Address;

class AddressHelper
{
    public static function GetAddressFromString($str): Address
    {
        $addrArray = explode(' ', $str);
        $length = count($addrArray);
        $address = new Address();
        $address->Zip = $addrArray[$length - 1];
        $address->State = $addrArray[$length - 2];
        $address->BdNumber = $addrArray[0];
        return $address;
    }
}