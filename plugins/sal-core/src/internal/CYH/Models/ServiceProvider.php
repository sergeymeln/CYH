<?php


namespace CYH\Models;


use CYH\Models\Core\Model;
use CYH\Models\Html\Link;

class ServiceProvider extends Model
{
    public $Id;
    public $BusinessId;
    public $Logo;
    public $Name;
    public $Tagline;
    public $Description;
    public $Legal;
    public $HeroImage;
    public $IsActive;
    public $OrderUrl;
    public $AddressType;
    public $Rank;

    /* @var Link */
    public $NavigationLink;
    /* @var \CYH\Models\Phone */
    public $Phone;
    /* @var \CYH\Models\GWP */
    public $GWP;
    /* @var \CYH\Models\BBBInfo */
    public $BBBInfo;

}