<?php


namespace CYH\Models;


use CYH\Models\Core\Model;

class ServiceProviderCategory extends Model
{
    public $Id;
    public $Price;
    public $PriceDescriptionBegin;
    public $PriceDescriptionEnd;
    public $Name;
    public $Tagline;
    public $Description;
    public $Legal;
    public $Logo;
    public $HeroImage;
    public $IsActive;
    public $OrderUrl;
    public $AddressType;
    public $Rank;

    /* @var Link */
    public $NavigationLink;
    /* @var $Phone Phone */
    public $Phone;
    /* @var $Provider ServiceProvider */
    public $Provider;
    /* @var $Category Category */
    public $Category;

}