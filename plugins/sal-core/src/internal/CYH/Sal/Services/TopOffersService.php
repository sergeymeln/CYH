<?php


namespace CYH\Sal\Services;


use CYH\Models\Core\ResultCodes;
use CYH\Models\Factory\TopOfferFactory;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\Cache\CacheSettings;
use CYH\Models\TopOffer;
use CYH\Sal\Services\Base\BaseService;

class TopOffersService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetTopOffers(TopOfferFilter $filter, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetTopOffers($filter, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $value)
            {
                $topOffers[] = TopOfferFactory::CreateTopOfferFromArray($value);
            }
            return $topOffers;
        }
        else
        {
            return [];
        }
    }

    public function GetTopOffersByProvider(TopOfferFilter $filter, $spId, CacheSettings $cacheSettings)
    {
        $res = $this->_salConnector->GetTopOffersByProvider($filter, $spId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && !empty($res->Data))
        {
            return TopOfferFactory::CreateTopOfferFromArray($res->Data);
        }
        else
        {
            return null;
        }
    }

    public function GetTopOffersByCos(TopOfferFilter $filter, $cosId, CacheSettings $cacheSettings): array
    {
        $res = $this->_salConnector->GetTopOffersByCos($filter, $cosId, $cacheSettings);
        if ($res->Status == ResultCodes::SUCCESS && count($res->Data) > 0)
        {
            foreach ($res->Data as $value)
            {
                $topOffers[] = TopOfferFactory::CreateTopOfferFromArray($value);
            }
            return $topOffers;
        }
        else
        {
            return [];
        }
    }
}