<?php


namespace CYH\ViewModels\UI;


class ListItem
{
    public $IdLink;
    public $Logo;
    public $Title;
    public $Tagline;
    /* @var $Description array */
    public $Description;
    /* @var Button */
    public $ActionButton;
    /* @var LegalModal */
    public $TermsAndConditions;
    public $StartingAtDescription;
    public $EndingAtDescription;
    public $Price;
    public $ChannelCount;
    public $ChannelCountLabel;

    public function __construct()
    {
        $this->ActionButton = new Button('');
    }
}