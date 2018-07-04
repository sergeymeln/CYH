<?php


namespace CYH\Helpers;


use CYH\Models\UrlTarget;
use CYH\ViewModels\UI\LinkTargets;

class HtmlHelper
{
    public static function GetPhoneHref($phone)
    {
        return 'tel:' . $phone;
    }

    public static function MapTargetField($target)
    {
        switch ($target)
        {
            case UrlTarget::NEW_TAB:
                $value = LinkTargets::BLANK;
                break;
            case UrlTarget::SAME_TAB:
            default:
                $value = LinkTargets::SELF;
                break;
        }

        return $value;
    }
}