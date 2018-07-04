<?php


namespace CYH\ViewModels\UI;


class HeaderLink
{
    public $Link;
    public $Name;

    public function __construct($link, $name)
    {
        $this->Link = $link;
        $this->Name = $name;
    }
}