<?php


namespace CYH\ViewModels\UI;


class AddressSearchEmbedded
{
    public $Phone;
    public $GaEventTrackingCode;

    public function __construct($phone = null, $googleCode = null)
    {
        $this->Phone = $phone;
        $this->GaEventTrackingCode = $googleCode;
    }
}