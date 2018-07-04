<?php


namespace CYH\ViewModels\UI;


class Button
{
    public $Label;
    public $Link;
    public $CssClass;
    public $Target; //self, blank, etc.
    public $ColorOverride;
    public $BackgroundColorOverride;

    public function __construct($label, $link = '', $cssClass = '', $linkTarget = LinkTargets::SELF)
    {
        $this->Label = $label;
        $this->Link = $link;
        $this->CssClass = $cssClass;
        $this->Target = $linkTarget;
    }
}