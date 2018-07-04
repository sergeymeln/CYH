<?php


namespace CYH\Context;


use CYH\Context\Base\ControllerContext;
use CYH\Helpers\CookieStorageHelper;
use CYH\Models\Authentication\Principal;
use CYH\Models\Encryption\AESSettings;
use CYH\Models\SitesConst;
use CYH\RG\Services\AuthenticationService;

class ContextFactory
{
    public static function CreateControllerContext($pluginName = '', $authCookieStorageName = null): ControllerContext
    {
        $context = new ControllerContext();
        $context->PluginName = $pluginName;
        $context->SiteType = self::GetSiteType();
        $context->Principal = self::InitializePrincipal($authCookieStorageName);
        self::InitializeSuperglobals($context);

        return $context;
    }

    protected static function GetSiteType()
    {
        $homeUrl = home_url('/');
        $hostName = parse_url($homeUrl, PHP_URL_HOST);
        switch ($hostName)
        {
            case 'cybenefits-local':                       //local environment host
            case 'cybenefits-local.vag':                   //local environment Vagrant host
            case 'staging.connectyourbenefits.com':        //staging environment host
            case 'www.connectyourbenefits.com':            //production environment host
                return SitesConst::CONNECT_YOUR_BENEFITS;
            case 'cyh-local':                              //local environment host
			case 'cyh-local.vag':                          //local environment Vagrant host
            case 'staging.connectyourhome.com':            //staging environment host
            case 'www.connectyourhome.com':                //production environment host
            case 'justonecall-local':                      //local environment host
            case 'www.justonecalltoconnectitall.com':      //staging environment host
                return SitesConst::CONNECT_YOUR_HOME;
            case 'dish-systems-local':                     //local environment host
            case 'dish-systems-local.vag':                 //local environment Vagrant host
            case 'dish-systems.com':                       //production environment host
            case 'staging.dish-systems.com':               //staging environment host
                return SitesConst::DISH_SYSTEMS;
            case 'order-spectrum-local':                   //local environment host
            case 'order-spectrum-local.vag':               //local environment Vagrant host
            case 'www.orderspectrum.com':                  //production environment host
                return SitesConst::ORDER_SPECTRUM;
            case 'cable-country-local':                    //local environment host
            case 'cable-country-local.vag':                //local environment Vagrant host
            case 'www.cablecountry.com':                   //production environment host
                return SitesConst::CABLE_COUNTRY;
            case 'cyc-local':                              //local environment host
            case 'cyc-local.vag':                          //local environment Vagrant host
            case 'www.connectyourcondo.com':               //production environment host
                return SitesConst::CONNECT_YOUR_CONDO;
            case 'connect-your-apt-local':                 //local environment host
            case 'connect-your-apt-local.vag':             //local environment Vagrant host
            case 'www.connectyourapartment.com':           //production environment host
                return SitesConst::CONNECT_YOUR_APARTMENT;
            case 'cycredit-local':                         //local environment host
            case 'cycredit-local.vag':                     //local environment Vagrant host
            case 'www.connectyourcredit.com':              //production environment host
                return SitesConst::CONNECT_YOUR_CREDIT;
            case 'cymove-local.vag':                       //local environment Vagrant host
            case 'www.connectyourmove.com':                //production environment host
                return SitesConst::CONNECT_YOUR_MOVE;
            case 'cylead-local.vag':                       //local environment Vagrant host
            case 'www.connectyourleads.com':               //production environment host
                return SitesConst::CONNECT_YOUR_LEADS;
            case 'alarmnation-local.vag':                //local environment Vagrant host
            case 'alarmnation.com':                   //production environment host
                return SitesConst::ALARMNATION;
            case 'satelliteinternetpros-local.vag':                //local environment Vagrant host
            case 'satelliteinternetpros.com':                   //production environment host
                return SitesConst::SATELLITEINTERNETPROS;
            default:
                return SitesConst::UNKNOWN;
        }
    }

    protected static function InitializeSuperglobals(ControllerContext $context)
    {
        $context->Request = $_REQUEST;
        $context->Get = $_GET;
        $context->Post = $_POST;
        $context->Server = $_SERVER;
        $context->Environment = $_ENV;
        $context->Cookies = $_COOKIE;
        $context->Files = $_FILES;
    }

    protected static function InitializePrincipal($authCookieStorageName)
    {
        return self::GetPrincipalInfo(is_null($authCookieStorageName) ? RG_AUTH_NAME : $authCookieStorageName);
    }

    /* @return Principal|null */
    protected static function GetPrincipalInfo($cookieName)
    {
        $encryptSettings = new AESSettings();
        $authenticationService = new AuthenticationService($encryptSettings);

        $authInfo = CookieStorageHelper::GetCookie($cookieName);
        if ($authInfo == null) {
            return null;
        }

        $principal = $authenticationService->DecodeAuthTicket($authInfo);
        return $principal;
    }
}