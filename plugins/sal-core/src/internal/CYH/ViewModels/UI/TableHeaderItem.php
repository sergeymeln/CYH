<?php


namespace CYH\ViewModels\UI;


class TableHeaderItem
{
    public $Name;
    public $CssClass;

    public function __construct($name, $cssClass = '')
    {
        $this->Name = $name;
        $this->CssClass = $cssClass;
    }
}