<?php


namespace CYH\ViewModels\UI;


use CYH\ViewModels\RenderMode;

class GridItem
{
    public $Logo;
    public $Title;
    public $Tagline;
    public $Description;
    public $DescrRenderMode;
    /* @var Button */
    public $ActionButton;
    public $AdditionalDetails;

    public function __construct()
    {
        $this->DescrRenderMode = RenderMode::STRING;
        $this->ActionButton = new Button('');
    }
}