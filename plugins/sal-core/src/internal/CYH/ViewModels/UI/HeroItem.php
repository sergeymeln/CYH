<?php


namespace CYH\ViewModels\UI;


use CYH\ViewModels\RenderMode;

class HeroItem
{
    public $HeroImageUrl;
    public $Heading;
    public $HeadingIntro;
    /* @var $HeroMsg array|string */
    public $HeroMsg;
    public $HeroMsgRenderMode = RenderMode::STRING;
    public $GaEventTrackingCode; //attached to onClick event
    public $Phone;
}