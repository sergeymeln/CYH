<?php


namespace CYH\Navigation;


use CYH\Helpers\FormatHelper;
use CYH\Models\Category;
use CYH\Models\ServiceProvider;
use CYH\Models\ServiceProviderCategory;

class ConnectYourHomeUrl
{
    public static function GetSpCategoriesUrl(ServiceProvider $sp)
    {
        return '/brands/' . FormatHelper::GetUrlFriendlyString($sp->Name) ;
    }

    public static function GetCategorySpUrl(Category $cat)
    {
        return '/category/' . FormatHelper::GetUrlFriendlyString($cat->Name);
    }

    public static function GetSpCosProductsUrl(ServiceProviderCategory $spCat)
    {
        return '/brands/' . FormatHelper::GetUrlFriendlyString($spCat->Provider->Name) . '/' . FormatHelper::GetUrlFriendlyString($spCat->Name);
    }

    public static function GetSpCategoryProductsUrl(ServiceProviderCategory $spCat)
    {
        return '/brands/' . FormatHelper::GetUrlFriendlyString($spCat->Provider->Name) . '/' . FormatHelper::GetUrlFriendlyString($spCat->Category->Name);
    }
}