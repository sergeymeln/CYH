<?php


namespace CYH\ViewModels\UI;


class AdditionalDetailsItem
{
    public $Name;
    public $Value;

    public function __construct($name, $value)
    {
        $this->Name = $name;
        $this->Value = $value;
    }
}