<?php


namespace CYH\Models\Filters;


class ProductFilter
{
    public $GroupId = null;
    public $Zip = null;
    public $UserId = null;
    public $BestOffersOnly = null;
    public $Metadata = null;
    public $providerId = null; //intentionally lowercased to match web service
}