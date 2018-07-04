<?php


namespace CYH\Models\Factory;


use CYH\Models\BBBInfo;
use CYH\Models\Link;
use CYH\Models\Phone;
use CYH\Models\ServiceProvider;

class ServiceProviderFactory
{
    public static function CreateServiceProviderFromArray(array $serviceProvider): ServiceProvider
    {
        /* @var $sp ServiceProvider */
        $sp = ServiceProvider::CreateFromArray($serviceProvider);

        if (!is_null($serviceProvider['Phone']))
        {
            $sp->Phone = Phone::CreateFromArray($serviceProvider['Phone']);
        }
        if (!is_null($serviceProvider['BBBInfo']))
        {
            $sp->BBBInfo = BBBInfo::CreateFromArray($serviceProvider['BBBInfo']);
        }
        if (!is_null($serviceProvider['NavigationLink']))
        {
            $sp->NavigationLink = Link::CreateFromArray($serviceProvider['NavigationLink']);
        }
        else
        {
            $sp->NavigationLink = new Link();
        }

        return $sp;
    }
}