<?php


namespace CYH\ViewModels\UI;


class HeaderSectionItem
{
    public $PageHeadingLeft; //for the STRING render mode only this part is used
    public $PageHeadingRight;
    public $PageStrapline;
    public $Description;
    public $RenderMode;
    /* @var $HeaderLinks array */
    public $HeaderLinks = [];
}