<?php


namespace CYH\Models;


use CYH\Models\Core\Model;

class Product extends Model
{
    public $Id;
    public $Price;
    public $SpecialPromo;
    public $PriceDescriptionBegin;
    public $PriceDescriptionEnd;
    public $EffectiveDateFrom;
    public $EffectiveDateTo;
    public $IsBestOffer;
    public $Name;
    public $Tagline;
    public $Description;
    public $Legal;
    public $Logo;
    public $HeroImage;
    public $IsActive;
    public $DownloadSpeed;

    /* @var $Phone \CYH\Models\Phone */
    public $Phone;
    /* @var $ServiceProviderCategory \CYH\Models\ServiceProviderCategory */
    public $ServiceProviderCategory;
    public $AddressType;
    public $Rank;
}