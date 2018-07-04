<?php


namespace CYH\Sal\Services;


use CYH\Models\Core\ResultCodes;
use CYH\Models\Cache\CacheSettings;
use CYH\Models\Factory\ServiceProviderFactory;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\ServiceProvider;
use CYH\Sal\Services\Base\CacheableService;
use CYH\WpOptionsHandlers\Pages\SpSuppressionOptions;

class ServiceProviderService extends CacheableService
{

    public function __construct()
    {
        parent::__construct();
    }

    public function GetServiceProviderList(ServiceProviderFilter $filter, CacheSettings $cacheSettings): array
    {
        $spRes = $this->_salConnector->GetProvidersList($filter, $cacheSettings);
        if ($spRes->Status == ResultCodes::SUCCESS && count($spRes->Data) > 0)
        {
            foreach ($spRes->Data as $spItem)
            {
                $spList[] = ServiceProviderFactory::CreateServiceProviderFromArray($spItem);
            }
            return $spList;
        }
        else
        {
            return [];
        }
    }

    /**
     * Loads the list of Service Providers except the ones that were suppressed in settings (if settings are enabled on site)
     * Otherwise acts identically to GetServiceProviderList
     * @param ServiceProviderFilter $filter
     * @param CacheSettings $cacheSettings
     * @return array
     */
    public function GetServiceProviderListSup(ServiceProviderFilter $filter, CacheSettings $cacheSettings): array
    {
        $spList = $this->GetServiceProviderList($filter, $cacheSettings);
        $suppressList = SpSuppressionOptions::GetSettings();
        if (!empty($suppressList))
        {
            foreach ($spList as $key => $value)
            {
                /* @var $value ServiceProvider */
                if (isset($suppressList[SpSuppressionOptions::GetPrefix() . $value->Id]) &&
                    $suppressList[SpSuppressionOptions::GetPrefix() . $value->Id] == true)
                {
                    unset($spList[$key]);
                }
            }
        }

        return $spList;
    }

    public function GetServiceProvider($id, CacheSettings $cacheSettings)
    {
        $res = $this->_salConnector->GetProviderInfo($id, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            return ServiceProviderFactory::CreateServiceProviderFromArray($res->Data);
        }
        else
        {
            return null;
        }
    }

    public function GetServiceProviderByCos($ctId, CacheSettings $cacheSettings)
    {
        $res = $this->_salConnector->GetProviderInfo($ctId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            return ServiceProviderFactory::CreateServiceProviderFromArray($res->Data);
        }
        else
        {
            return null;
        }
    }
}