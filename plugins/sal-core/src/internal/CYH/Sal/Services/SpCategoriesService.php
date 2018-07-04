<?php


namespace CYH\Sal\Services;


use CYH\Models\Core\ResultCodes;
use CYH\Models\Factory\ServiceProviderCategoryFactory;
use CYH\Models\Filters\SPCategoriesFilter;
use CYH\Models\ServiceProviderCategory;
use CYH\Sal\Services\Base\CacheableService;
use CYH\Models\Cache\CacheSettings;
use CYH\Sal\Settings;
use CYH\WpOptionsHandlers\Pages\SpCatSuppressionOptions;

class SpCategoriesService extends CacheableService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetSpCategoriesList(CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetSpCategoriesList($cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $spCatItem)
            {
                $spCatList[] = ServiceProviderCategoryFactory::CreateSpCategoryFromArray($spCatItem);
            }
            return $spCatList;
        }
        else
        {
            return [];
        }
    }

    public function GetCategoriesBySp($spId, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetSpCategoriesListByProvider($spId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $spCatItem)
            {
                $spCatList[] = ServiceProviderCategoryFactory::CreateSpCategoryFromArray($spCatItem);
            }
            return $spCatList;
        }
        else
        {
            return [];
        }
    }

    /**
     * Loads the list of Service Provider Categories except the ones that were suppressed in settings (if settings are enabled on site)
     * Otherwise acts identically to GetCategoriesBySp
     * @param $spId
     * @param CacheSettings $cacheSettings
     * @return array
     */
    public function GetCategoriesBySpSup($spId, CacheSettings $cacheSettings): array
    {
        $spCatList = $this->GetCategoriesBySp($spId, $cacheSettings);
        $suppressList = SpCatSuppressionOptions::GetSettings();
        if (!empty($suppressList))
        {
            foreach ($spCatList as $key => $value)
            {
                /* @var $value ServiceProviderCategory */
                if (isset($suppressList[SpCatSuppressionOptions::GetPrefix() . $value->Id]) &&
                    $suppressList[SpCatSuppressionOptions::GetPrefix() . $value->Id] == true)
                {
                    unset($spCatList[$key]);
                }
            }
        }

        return $spCatList;
    }

    /**
     * @return ServiceProviderCategory|null
     */
    public function GetSpCategoriesById($spCatId, $spId, CacheSettings $cacheSettings)
    {
        $spCategories = $this->GetCategoriesBySp($spId, $cacheSettings);
        foreach ($spCategories as $spCat)
        {
            /* @var $spCat ServiceProviderCategory */
            if ($spCat->Id == $spCatId)
            {
                return $spCat;
            }
        }

        //if we got here we found nothing
        return null;
    }

    public function GetSpCategoriesByCos(SPCategoriesFilter $filter, $cosId, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetSpCategoriesListByCos($filter, $cosId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $spCatItem)
            {
                $spCatList[] = ServiceProviderCategoryFactory::CreateSpCategoryFromArray($spCatItem);
            }
            return $spCatList;
        }
        else
        {
            return [];
        }
    }


    public function GetSpCategoryListBySpIdAndCos(SPCategoriesFilter $filter,$spId, $cosId, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetSpCategoryListBySpIdAndCos($filter, $spId, $cosId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $spCatItem)
            {
                $spCatList[] = ServiceProviderCategoryFactory::CreateSpCategoryFromArray($spCatItem);
            }
            return $spCatList;
        }
        else
        {
            return [];
        }
    }

    /**
     * Loads the list of Category Service Providers except the ones that were suppressed in settings (if settings are enabled on site)
     * Otherwise acts identically to GetSpCategoriesByCos
     * @param $filter
     * @param $cosId
     * @param CacheSettings $cacheSettings
     * @return array
     */
    public function GetSpCategoriesByCosSup(SPCategoriesFilter $filter, $cosId, CacheSettings $cacheSettings): array
    {
        $catSpList = $this->GetSpCategoriesByCos($filter, $cosId, $cacheSettings);
        $suppressList = SpCatSuppressionOptions::GetSettings();
        if (!empty($suppressList))
        {
            foreach ($catSpList as $key => $value)
            {
                /* @var $value ServiceProviderCategory */
                if (isset($suppressList[SpCatSuppressionOptions::GetPrefix() . $value->Id]) &&
                    $suppressList[SpCatSuppressionOptions::GetPrefix() . $value->Id] == true)
                {
                    unset($catSpList[$key]);
                }
            }
        }

        return $catSpList;
    }


}