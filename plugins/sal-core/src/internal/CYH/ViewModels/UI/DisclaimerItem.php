<?php


namespace CYH\ViewModels\UI;


class DisclaimerItem
{
    public $Disclaimer;
    public $TermsOfService;

    public function __construct($disclaimer = '', $terms = '')
    {
        $this->Disclaimer = $disclaimer;
        $this->TermsOfService = $terms;
    }
}