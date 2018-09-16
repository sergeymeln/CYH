<?php

namespace CYH\Sal\Repositories;


use CYH\Models\Cache\CacheSettings;
use CYH\Models\Core\Result;
use CYH\Models\Core\ResultCodes;
use CYH\Models\Filters\CategoryFilter;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\Filters\SPCategoriesFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\RG\Login;
use CYH\Models\RG\Registration;
use CYH\Sal\Curl\CurlHelper;
use CYH\Sal\Exceptions\AuthenticationSalException;
use CYH\Sal\Exceptions\GenericSalException;
use CYH\Sal\Repositories\Cache\CacheFactory;
use CYH\Sal\Repositories\Cache\CacheTypes;
use CYH\Sal\Repositories\Cache\MemcachedCacheProvider;
use CYH\Sal\Repositories\Cache\WpTransientCacheProvider;
use CYH\Sal\Settings;

class SalRepository
{
    use CurlHelper;

    private $_badResponseCodes = [400, 401, 404, 500];
    private $_requestSettings;
    private $_cacheProvider = null;

    public function __construct(array $settings)
    {
        $this->_requestSettings = $settings;
        $this->_cacheProvider = CacheFactory::GetCacheProvider(CacheTypes::WP_FILE_SYSTEM);
    }

    public function GetProvidersList(ServiceProviderFilter $filter, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = $this->_requestSettings['Url.ProvidersList'];
            if (!is_null($filter->GroupId) || !is_null($filter->Zip) || !is_null($filter->UserId)
                || !is_null($filter->Metadata)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [
                $this->_requestSettings['Auth']
            ]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetProductsBySpAndCatOfService($spId, $cosId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$spId, $cosId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.ProductPackagesBySpAndCosId'], $spId, $cosId);
            $cachedData = $this->SendGetRequest($preparedUrl, [$this->_requestSettings['Auth']]);

            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetProductPackagesByCatOfService(ProductFilter $filter, $cosId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cosId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = sprintf($this->_requestSettings['Url.ProductPackagesByCosId'], $cosId);
            if (!is_null($filter->GroupId) || !is_null($filter->Zip) || !is_null($filter->UserId)
                || !is_null($filter->BestOffersOnly) || !is_null($filter->Metadata)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [
                $this->_requestSettings['Auth']
            ]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }


    public function GetAllProductPackages(ProductFilter $filter, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = $this->_requestSettings['Url.ProductPackagesList'];
            if (!is_null($filter->GroupId) || !is_null($filter->Zip) || !is_null($filter->UserId)
                || !is_null($filter->BestOffersOnly) || !is_null($filter->Metadata)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [
                $this->_requestSettings['Auth']
            ]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetProductsBySpAndSpCategory(ProductFilter $filter, $categoryId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $categoryId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = sprintf($this->_requestSettings['Url.ProductPackagesBySpCategory'], $categoryId);
            if (!is_null($filter->GroupId) || !is_null($filter->Zip) || !is_null($filter->UserId)
                || !is_null($filter->BestOffersOnly) || !is_null($filter->Metadata) || !is_null($filter->providerId)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [
                $this->_requestSettings['Auth']
            ]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetSpProductsList(ProductFilter $filter, $spId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $spId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = sprintf($this->_requestSettings['Url.ProductPackagesBySp'], $spId);
            if (!is_null($filter->GroupId) || !is_null($filter->BestOffersOnly) || !is_null($filter->UserId)
                || !is_null($filter->Zip)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }
            $cachedData = $this->SendGetRequest($url, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetProviderInfo($spId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$spId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.ProviderById'], $spId);

            $cachedData = $this->SendGetRequest($preparedUrl, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }


    public function GetProvidersByCos($ctId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$ctId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.ProvidersByCos'], $ctId);

            $cachedData = $this->SendGetRequest($preparedUrl, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }


    public function GetSpCategoriesList(CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $cachedData = $this->SendGetRequest($this->_requestSettings['Url.ServiceProviderCategoryList'],
                [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetSpCategoriesListByProvider($spId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$spId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.SpCategoriesListByProvider'], $spId);
            $cachedData = $this->SendGetRequest($preparedUrl, [$this->_requestSettings['Auth']]);

            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetSpCategoriesListByCos(SPCategoriesFilter $filter, $cosId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cosId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.ServiceProviderCategoryByCos'], $cosId);

            if (!is_null($filter->GroupId) || !is_null($filter->Zip) || !is_null($filter->UserId)
                || !is_null($filter->Metadata)) {
                $preparedUrl .= '?';
                $preparedUrl .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($preparedUrl, [
                $this->_requestSettings['Auth']
            ]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetSpCategoryListBySpIdAndCos(SPCategoriesFilter $filter, $spId, $cosId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $spId, $cosId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.SpCategoryListBySpIdAndCos'], $spId,$cosId);

            if (!is_null($filter->GroupId) || !is_null($filter->Zip) || !is_null($filter->UserId)
                || !is_null($filter->Metadata)) {
                $preparedUrl .= '?';
                $preparedUrl .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($preparedUrl, [
                $this->_requestSettings['Auth']
            ]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }




    public function GetCategoriesList(CategoryFilter $filter, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = $this->_requestSettings['Url.CategoryOfServiceList'];
            if (!is_null($filter->GroupId) || !is_null($filter->UserId) || !is_null($filter->Zip)
                || !is_null($filter->Metadata)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }
            $cachedData = $this->SendGetRequest($url, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetGroupInfo($id, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$id, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $preparedUrl = sprintf($this->_requestSettings['Url.GroupInfo'], $id);
            $cachedData = $this->SendGetRequest($preparedUrl, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetTopOffers(TopOfferFilter $filter, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = $this->_requestSettings['Url.TopOffer'];
            if (!is_null($filter->GroupId) || !is_null($filter->Metadata) || !is_null($filter->UserId)
                || !is_null($filter->Zip)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetTopOffersByProvider(TopOfferFilter $filter, $spId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $spId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = sprintf($this->_requestSettings['Url.TopOfferBySp'], $spId);
            if (!is_null($filter->GroupId) || !is_null($filter->Metadata) || !is_null($filter->UserId)
                || !is_null($filter->Zip)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetTopOffersByCos(TopOfferFilter $filter, $cosId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$filter, $cosId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $url = sprintf($this->_requestSettings['Url.TopOfferByCos'], $cosId);
            if (!is_null($filter->GroupId) || !is_null($filter->Metadata) || !is_null($filter->UserId)
                || !is_null($filter->Zip)) {
                $url .= '?';
                $url .= http_build_query($filter);
            }

            $cachedData = $this->SendGetRequest($url, [$this->_requestSettings['Auth']]);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function CheckLogin(Login $login, $groupId): Result
    {
        $headers = [
            $this->_requestSettings['Auth'],
            "CyhGroupId:" . $groupId,
            "CyhCurrentPortal:" . Settings::GetPortalType()
        ];

        return $this->SendPostRequest($this->_requestSettings['Url.LoginCustomer'], $headers, $login);
    }

    public function CreateCustomer(Registration $regInfo, $groupId): Result
    {
        $headers = [
            $this->_requestSettings['Auth'],
            "CyhGroupId:" . $groupId,
            "CyhCurrentPortal:" . Settings::GetPortalType()
        ];

        return $this->SendPostRequest($this->_requestSettings['Url.CreateCustomer'], $headers, $regInfo);
    }

    public function CreateCustomerByZip(Registration $regInfo, $groupId): Result
    {
        $headers = [
            $this->_requestSettings['Auth'],
            "CyhGroupId:" . $groupId,
            "CyhCurrentPortal:" . Settings::GetPortalType()
        ];

        return $this->SendPostRequest($this->_requestSettings['Url.CreateCustomerByZip'], $headers, $regInfo);
    }

    public function GetUserProfile($accessToken, $groupId, CacheSettings $cacheSettings): Result
    {
        $cacheKey = $this->_cacheProvider->GetCacheKey(__CLASS__, __FUNCTION__, [$accessToken, $groupId, $cacheSettings->Lifespan]);

        if ($cacheSettings->IsEnabled == false || ($cachedData = $this->_cacheProvider->GetCachedData($cacheKey)) === false) {
            $headers = [
                "Authorization: Bearer " . $accessToken,
                "CyhGroupId:" . $groupId,
                "CyhCurrentPortal:" . Settings::GetPortalType()
            ];

            $cachedData = $this->SendGetRequest($this->_requestSettings['Url.UserProfile'], $headers);
            if ($cachedData->Status == ResultCodes::SUCCESS && $cacheSettings->IsEnabled == true) {
                $this->_cacheProvider->StoreInCache($cacheKey, $cachedData, $cacheSettings->Lifespan);
            }
        }

        return $cachedData;
    }

    public function GetTokenByCrossPortalToken($cpt, $groupId): Result
    {
        $url = sprintf($this->_requestSettings['Url.TokenByCrossPortalToken'], $cpt);

        $headers = [
            $this->_requestSettings['Auth'],
            "CyhGroupId:" . $groupId,
            "CyhCurrentPortal:" . Settings::GetPortalType()
        ];

        return $this->SendGetRequest($url, $headers);
    }

    public function LogoutCustomer($accessToken, $groupId): Result
    {
        $headers = [
            "Authorization: Bearer " . $accessToken,
            "CyhGroupId:" . $groupId,
            "CyhCurrentPortal:" . Settings::GetPortalType()
        ];

        return $this->SendPostRequest($this->_requestSettings['Url.LogoutCustomer'], $headers, []);
    }

    private function SendGetRequest($url, array $headers): Result
    {
        $curl = curl_init();

        // set token
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // set api endpoint
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_REFERER, $this->_requestSettings['Referrer']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // setup potential error
        $resp = curl_exec($curl);

        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->CheckForCurlErrors($curl);
        $this->CheckStatusCode($statusCode);

        $res = new Result();
        $res->Status = ($statusCode == 200) ? ResultCodes::SUCCESS : ResultCodes::ERROR;
        $res->Data = json_decode($resp, true);

        // close curl object
        curl_close($curl);
        return $res;
    }

    /*
     * @return Result
     */
    private function SendPostRequest($url, array $customHeaders, $data): Result
    {
        $encodedData = json_encode($data);

        $mandatoryHeaders = ["Content-Type: application/json"];

        $headers = array_merge($mandatoryHeaders, $customHeaders);

        $curl = curl_init();
        // set token
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // set api endpoint
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_REFERER, $this->_requestSettings['Referrer']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        // setup potential error
        $resp = curl_exec($curl);

        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->CheckForCurlErrors($curl);
        $this->CheckStatusCode($statusCode);

        $res = new Result();
        $res->Status = ($statusCode == 200) ? ResultCodes::SUCCESS : ResultCodes::ERROR;
        $res->Data = json_decode($resp, true);

        // close curl object
        curl_close($curl);
        return $res;
    }

    private function CheckStatusCode($statusCode)
    {
        //TODO Add logging of errors
        if (in_array($statusCode, $this->_badResponseCodes)) {
            switch ($statusCode) {
                case '401':
                    throw new AuthenticationSalException("The API Key has expired or invalid");
                    break;
                default:
                    throw new GenericSalException("Unexpected SAL HTTP status code: " . $statusCode);
                    break;
            }
        }
    }

    private function CheckForCurlErrors($curlConn)
    {
        //TODO Add logging of errors
        $errNo = curl_errno($curlConn);
        if ($errNo != 0) {
            throw new GenericSalException("Unexpected CURL error: " . $this->GetCurlErrorDescription($errNo));
        }
    }
}