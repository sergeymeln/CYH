<?php


namespace CYH\Models\Factory;


use CYH\Models\Category;
use CYH\Models\Link;
use CYH\Models\Phone;
use CYH\Models\ServiceProviderCategory;

class ServiceProviderCategoryFactory
{
    public static function CreateSpCategoryFromArray(array $spCat): ServiceProviderCategory
    {
        /* @var $spCategory ServiceProviderCategory */
        $spCategory = ServiceProviderCategory::CreateFromArray($spCat);
        if (!is_null($spCategory->Phone))
        {
            $spCategory->Phone = Phone::CreateFromArray($spCategory->Phone);
        }
        if (!is_null($spCategory->Provider))
        {
            $spCategory->Provider = ServiceProviderFactory::CreateServiceProviderFromArray($spCategory->Provider);
        }
        if (!is_null($spCategory->Category)) {
            $spCategory->Category = Category::CreateFromArray($spCategory->Category);
        }
        if (!is_null($spCategory->NavigationLink))
        {
            $spCategory->NavigationLink = Link::CreateFromArray($spCategory->NavigationLink);
        }
        else
        {
            $spCategory->NavigationLink = new Link();
        }

        return $spCategory;
    }
}