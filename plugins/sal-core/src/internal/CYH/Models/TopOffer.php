<?php


namespace CYH\Models;


use CYH\Models\Core\Model;

class TopOffer extends Model
{
    public $Name;
    public $Description;
    public $DescriptionParsed;
    public $Logo;
    public $Price;
    public $PriceDescriptionBegin;
    public $PriceDescriptionEnd;
    public $EffectiveDateFrom;
    public $EffectiveDateTo;
    public $Tagline;
    public $Legal;
    public $HeroImage;
    public $IsActive;

    /* @var Link */
    public $NavigationLink;
    /* @var \CYH\Models\Phone */
    public $Phone;
    /* @var \CYH\Models\ServiceProvider */
    public $Provider;

}