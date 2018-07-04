<?php

namespace CYH\Plugins;

use CYH\Models\Core\Environment;
use CYH\Models\SitesConst;
use CYH\WpOptionsHandlers\Pages\GeneralOptions;

class SalCore extends PluginBase
{
    public static function Install()
    {
        flush_rewrite_rules();
    }

    public static function GetPluginSettings()
    {
        $generalSettings = GeneralOptions::GetSettings();

        if (isset($generalSettings['general_environment']))
        {
            switch ($generalSettings['general_environment']) {
                case Environment::LIVE:
                    return self::GetProductionEnvironmentSettings();
                case Environment::TEST:
                default:
                    return self::GetTestEnvironmentSettings();
            }
        }
        else
        {
            return self::GetTestEnvironmentSettings();
        }

    }

    public static function GetTestEnvironmentSettings($site = SitesConst::CONNECT_YOUR_HOME)
    {
        $generalOptions = GeneralOptions::GetSettings();
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoiYnZsRXlSRnVqTzJCc2trNk1DZ3hFTWtUcVR1Vy80bmRtVFFwTzZTWkxlVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.YONjvDZcnCDRzmyGGWcXkKl3XDYo0EBMGDgzLh2o3uM';
        $referrer = 'https://www.connectyourhome.com';

        //if settings have been initialized we are using them
        if (isset($generalOptions['general_api_key']) && !empty($generalOptions['general_api_key'])) {
            $token = $generalOptions['general_api_key'];
        }
        if (isset($generalOptions['general_domain']) && !empty($generalOptions['general_domain'])) {
            $referrer = $generalOptions['general_domain'];
        }

        $basicSettings = self::GenerateBasicSalSettings(
            'https://testapi.servicearealookup.com/api',
            $token,
            $referrer
        );

        //Melissadata settings
        $mdSettings = [
            'MelissaId' => 113933534,
            'Url.Personator' => "https://personator.melissadata.net/v3/WEB/ContactVerify/doContactVerify"
        ];

        $cyBenSettings = [
            'Page.Map' => [
                1 => '/cyb-results/?search=0', //all results for user's profile address
            ],
            'Auth.CookieLifespan' => 60 * 60 * 24 // represents 1 day lifespan
        ];

        return [
            'Sal.Settings' => $basicSettings,
            'Melissadata.Settings' => $mdSettings,
            'ConnectYourBenefits.Settings' => $cyBenSettings
        ];
    }

    public static function GetProductionEnvironmentSettings($site = SitesConst::CONNECT_YOUR_HOME)
    {
        $generalOptions = GeneralOptions::GetSettings();
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VySWQiOiJjZWU4MmMwNC00YTA0LTQwMmYtOTY4Ni00NzllMjg5OGRhY2MiLCJDbGllbnREb21haW5FbmNvZGVkIjoieEtiWjBqL0dobzZnLzd2d1YvdWsxNlNodG5WeVRzTHFVL05mVVBheHNxVT0iLCJUb2tlblR5cGUiOiJjbGllbnRfYWNjZXNzX3Rva2VuIn0.F_VB3rjXOGB67CxASPhVGMKlBnMfQ6dsNx0fbZLKcI8';
        $referrer = 'https://www.connectyourhome.com';

        //if settings have been initialized we are using them
        if (isset($generalOptions['general_api_key']) && !empty($generalOptions['general_api_key'])) {
            $token = $generalOptions['general_api_key'];
        }
        if (isset($generalOptions['general_domain']) && !empty($generalOptions['general_domain'])) {
            $referrer = $generalOptions['general_domain'];
        }

        $basicSettings = self::GenerateBasicSalSettings(
            'https://api.servicearealookup.com/api',
            $token,
            $referrer
        );

        //Melissadata settings
        $mdSettings = [
            'MelissaId' => 113933534,
            'Url.Personator' => "https://personator.melissadata.net/v3/WEB/ContactVerify/doContactVerify"
        ];

        $cyBenSettings = [
            'Page.Map' => [
                1 => '/cyb-results/?search=0', //all results for user's profile address
            ],
            'Auth.CookieLifespan' => 60 * 60 * 24 // represents 1 day lifespan
        ];

        return [
            'Sal.Settings' => $basicSettings,
            'Melissadata.Settings' => $mdSettings,
            'ConnectYourBenefits.Settings' => $cyBenSettings
        ];
    }

    public static function Uninstall()
    {
        //has to be present ot make sure old settings will be deleted across sites
        delete_option('Sal.Settings');
        delete_option('Melissadata.Settings');
        delete_option('ConnectYourBenefits.Settings');
    }

    private static function GenerateBasicSalSettings($url, $token, $referrer)
    {
        return [
            //authentication
            'Auth' => 'Authorization: Bearer ' . $token,
            'Referrer' => $referrer,

            //Category
            'Url.CategoryOfServiceList' => $url . '/category/search',

            //ServiceProvider
            'Url.ProvidersList' => $url . '/provider/search',
            'Url.ProvidersByCos' => $url . '/provider/search/category/%s',
            'Url.ProviderById' => $url . '/serviceprovider/%s',

            //TopOffer
            'Url.TopOffer' => $url . '/provider/topoffer/search',
            'Url.TopOfferBySp' => $url . '/provider/%s/topoffer/search',
            'Url.TopOfferByCos' => $url . '/provider/topoffer/search/category/%s',

            //ServiceProviderCategory
            'Url.ServiceProviderCategoryList' => $url . '/provider/category/search',
            'Url.ServiceProviderCategoryByCos' => $url . '/provider/category/search/categoryofservice/%s',
            'Url.SpCategoriesListByProvider' => $url . '/provider/%s/category/search',
            'Url.SpCategoryListBySpIdAndCos' => $url . '/provider/%s/category/search/categoryofservice/%s',

            //Products
            'Url.ProductPackagesList' => $url . '/provider/category/product/search',
            'Url.ProductPackagesBySp' => $url . '/provider/%s/category/product/search',
            'Url.ProductPackagesBySpAndCosId' => $url . '/provider/%s/category/product/search/categoryOfService/%s',
            'Url.ProductPackagesBySpCategory' => $url . '/provider/category/%s/product/search',
            'Url.ProductPackagesByCosId' => $url . '/provider/category/product/search/categoryOfService/%s',


            'Url.GroupInfo' => $url . '/group/%s',

            'Url.CreateCustomer' => $url . '/customer/byEmailAndPassword',
            'Url.CreateCustomerByZip' => $url . '/customer/byEmail',
            'Url.LoginCustomer' => $url . '/Account/Login',
            'Url.LogoutCustomer' => $url . '/Account/Logout',
            'Url.UserProfile' => $url . '/user/Profile',
            'Url.TokenByCrossPortalToken' => $url . '/account/getToken?key=%s',

            'Url.RG.MyAccount' => '/redirect/my-profile/',
            'Url.RG.RedeemGift' => '/redirect/select-gift/',
            'Url.RG.Partial.ResetPassword' => '/forgot-password',
            'Url.RG.Partial.Login' => '/login'
        ];
    }
}