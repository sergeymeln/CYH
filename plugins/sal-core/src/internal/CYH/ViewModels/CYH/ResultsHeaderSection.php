<?php


namespace CYH\ViewModels\CYH;


use CYH\ViewModels\UI\Address;

class ResultsHeaderSection
{
    public $DisplayBreadcrumbs = true;
    /* @var $Address Address */
    public $Address;

    public function __construct($address)
    {
        $this->Address = $address;
    }
}