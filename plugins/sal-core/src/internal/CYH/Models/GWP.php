<?php


namespace CYH\Models;


use CYH\Models\Core\Model;

class GWP extends Model
{
    public $Id;
    public $RequestInstructions;
    public $Name;
    public $DisplayName;
    public $Value;
    public $IsActive;
    public $Fulfillment;
    public $ExternalWebsiteUrl;
    public $FulfillmentInstructions;
    public $DaysBeforeExpiration;
}