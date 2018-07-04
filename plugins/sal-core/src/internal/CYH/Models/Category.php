<?php


namespace CYH\Models;


use CYH\Models\Core\Model;

class Category extends Model
{
    public $Id;
    public $Name;
    public $Tagline;
    public $Description;
    public $Logo;
    public $HeroImage;
    public $Alias;
    public $IsActive;
    public $Naics;
}