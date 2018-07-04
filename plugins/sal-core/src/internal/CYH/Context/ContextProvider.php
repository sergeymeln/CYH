<?php


namespace CYH\Context;


use CYH\Context\Base\ControllerContext;

class ContextProvider
{
    private static $appContext = null;

    public static function GetContext($pluginName = ''): ControllerContext
    {
        return ContextFactory::CreateControllerContext($pluginName);
    }
}