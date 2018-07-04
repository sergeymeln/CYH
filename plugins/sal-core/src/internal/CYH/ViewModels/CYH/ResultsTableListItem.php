<?php


namespace CYH\ViewModels\CYH;


use CYH\ViewModels\UI\Button;

class ResultsTableListItem
{
    public $ProviderId;
    public $Logo;
    public $Title;
    public $Features = [];
    public $PriceDescriptionStart;
    public $PriceDescriptionEnd;
    public $Price;
    /* @var $OrderButton Button */
    public $OrderButton;
    /* @var $MoreInfoButton Button */
    public $MoreInfoButton;
    /* @var $ViewDisclaimerButton Button */
    public $ViewDisclaimerButton;
    public $Disclaimer;
}