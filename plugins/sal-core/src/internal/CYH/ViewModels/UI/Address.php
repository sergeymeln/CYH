<?php


namespace CYH\ViewModels\UI;


class Address
{
    public $Street;
    public $Route; //a.k.a building number
    public $Suite;
    public $City; //locality in address search
    public $State; //administrative_area_level_1 in address search
    public $Zip;
    public $Country;
}