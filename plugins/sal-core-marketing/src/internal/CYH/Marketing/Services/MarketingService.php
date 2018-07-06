<?php


namespace CYH\Marketing\Services;

use CYH\Marketing\Repositories\MarketingRepository;
use CYH\Sal\Services\Base\CacheableService;
use CYH\Marketing\Helpers\UrlHelper;
use CYH\Marketing\ViewModels\UI\CityItem;

class MarketingService extends CacheableService
{
    protected $marketingRepository = null;
    const INTERNET_USERS_IN_USA = 78.2;
    const TOP_PROVIDERS_COUNT = 5;
    const GBPS_TO_MBPS_MULTIPLIER = 1000;
    const INTERNET_CATEGORIES = [4,5];
    const INTERNET_TV_CATEGORIES = [7];

    public function __construct()
    {
        parent::__construct();
        $this->marketingRepository = new MarketingRepository();
    }

    public function GetCitiesData($data)
    {
        $citiesData = $this->marketingRepository->GetCitiesData($data);
        if(count($citiesData)>0) {
            $bullets = $this->marketingRepository->GetCityBullets($citiesData['city_id']);
            foreach($bullets as $bullet) {
                $citiesData['bullets'][] = $bullet;
            }
        }
        $zipCodes = explode('/', $citiesData['zip_code']);
        $citiesData['zip_code'] = trim($zipCodes[0]);
        $relatedCities = $this->marketingRepository->GetRelatedCities($citiesData);
        foreach($relatedCities as $relCity) {
            $citiesData['related_cities'][] = $this->getRelatedLinkData($relCity);
        }

        return $this->getCityFromData($citiesData);

    }

    /**
     * @param $data
     * @return array|bool
     */
    public function getCityFromUrl($data)
    {
        return $this->marketingRepository->getCityFromUrl($data);
    }

    /**
     * @param $data
     * @return array
     */
    private function getRelatedLinkData($data)
    {
        $linkData = ['state_code' => $data['state_code'], 'city_name' => $data['city_name'], 'city_normal_name' => $data['city_normal_name']];

        return $linkData;
    }

    /**
     * @param $zipCode
     * @return mixed
     */
    public function getCityByZip($zipCode)
    {
        $result = $this->marketingRepository->getCityByZip($zipCode);
        $cities = [];
        foreach($result as $city) {
            $cities[] = $city;
        }

        if(count($cities) == 0) {
            return false;
        }

        return $cities[0];
    }

    /**
     * @param $zipCode
     * @return string
     */
    public function getCityTitle($cityData)
    {
        return 'Best Cable TV and Internet Providers in '.$cityData['city_normal_name'].', '.$cityData['state_name'];
    }

    /**
     * @param $cityData
     * @return string
     */
    public function getCityDescription($cityData)
    {
        return 'Find local cable TV and internet providers in '.$cityData['city_normal_name'].', '.$cityData['state_name'].'. Call $1-111-111-111 for high-speed internet service providers.';
    }

    /**
     * @param $products
     * @param $city
     * @return array
     */
    public function getBulletsData($products, $city)
    {
        $data = [];
        $data['internetPlansCount'] = 0;
        $data['internetSecurityCount'] = 0;
        $data['cityInternetUsers'] = round(((int)$city->Population * self::INTERNET_USERS_IN_USA)/100/1000000,1);
        $data['bestTvValues'] = [];
        $index = 0;
        foreach($products as $prod) {
            if(in_array($prod->ServiceProviderCategory->Category->Id, self::INTERNET_CATEGORIES)) {
                $data['internetPlansCount']++;
                $data['internetSpeeds'][]=($prod->DownloadSpeed) ? $prod->DownloadSpeed : 0;
                $data['internetPrices'][]=$prod->Price;
                preg_match('/Security/i', $prod->ServiceProviderCategory->Provider->Legal, $matches);
                if(count($matches) > 0) {
                    $data['internetSecurityCount']++;
                }
                if($prod->IsBestOffer) {
                    $data['bestValues'][$index]['price'] = $prod->Price;
                    $data['bestValues'][$index]['offer'] = $prod->ServiceProviderCategory->Provider->Name;
                }
            }

            $data['allSpeeds'][]=($prod->DownloadSpeed) ? $prod->DownloadSpeed : 0;
            $data['allPrices'][]=$prod->Price;
            if($prod->IsBestOffer) {
                $data['allBestValues'][$index]['price'] = $prod->Price;
                $data['allBestValues'][$index]['offer'] = $prod->ServiceProviderCategory->Provider->Name;
            }
            if(in_array($prod->ServiceProviderCategory->Category->Id, self::INTERNET_TV_CATEGORIES)) {
                $data['tvPlansCount']++;
                $data['tvSpeeds'][]=($prod->DownloadSpeed) ? $prod->DownloadSpeed : 0;
                $data['tvPrices'][]=$prod->Price;

                if($prod->IsBestOffer) {
                    $data['bestTvValues'][$index]['price'] = $prod->Price;
                    $data['bestTvValues'][$index]['offer'] = $prod->ServiceProviderCategory->Provider->Name;
                }
            }

            $data['allData'][$index]['price'] = $prod->Price;
            $data['allData'][$index]['speed'] = ($prod->DownloadSpeed) ? $prod->DownloadSpeed : 0;
            $data['allData'][$index]['offer'] = $prod->ServiceProviderCategory->Provider->Name;

            $index++;
        }
        array_multisort(array_map(function($element) {
            return $element['price'];
        }, $data['bestValues']), SORT_ASC, $data['bestValues']);

        array_multisort(array_map(function($element) {
            return $element['price'];
        }, $data['allBestValues']), SORT_ASC, $data['allBestValues']);

        if(count($data['bestTvValues'])> 0) {
            array_multisort(array_map(function($element) {
                return $element['price'];
            }, $data['bestTvValues']), SORT_ASC, $data['bestTvValues']);

            $sum=0;
            foreach($data['bestTvValues'] as $val) {
                $sum+= $val['price'];
            }
            $avg = $sum/count($data['bestTvValues']);
            $data['bestOfferTvAvgPrice'] = '$'.round($avg,2);
        }


        $sum=0;
        foreach($data['bestValues'] as $val) {
            $sum+= $val['price'];
        }
        $avg = $sum/count($data['bestValues']);
        $data['bestOfferAvgPrice'] = '$'.round($avg,2);

        $sum=0;
        foreach($data['allBestValues'] as $val) {
            $sum+= $val['price'];
        }
        $avg = $sum/count($data['allBestValues']);
        $data['allBestOfferAvgPrice'] = '$'.round($avg,2);

        $sum=0;
        foreach($data['allPrices'] as $val) {
            $sum+= $val;
        }
        $avg = $sum/count($data['allPrices']);
        $data['avgPrice'] = '$'.round($avg,2);

        $sum=0;
        foreach($data['allSpeeds'] as $val) {
            $sum+= $val;
        }
        $avg = $sum/count($data['allSpeeds']);
        $data['avgSpeeds'] = round($avg*self::GBPS_TO_MBPS_MULTIPLIER, 2);

        $sum=0;
        foreach($data['internetPrices'] as $val) {
            $sum+= $val;
        }
        $avg = $sum/count($data['internetPrices']);
        $data['avgInternetPrice'] = '$'.round($avg,2);

        $sum=0;
        foreach($data['internetSpeeds'] as $val) {
            $sum+= $val;
        }
        $avg = $sum/count($data['internetSpeeds']);
        $data['avgInternetSpeed'] = round($avg*self::GBPS_TO_MBPS_MULTIPLIER,2);

        $data['bestOfferLowestPrice'] = '$'.$data['bestValues'][0]['price'];
        $data['bestOfferName'] = $data['bestValues'][0]['offer'];

        $data['allBestOfferLowestPrice'] = '$'.$data['allBestValues'][0]['price'];
        $data['allBestOfferName'] = $data['allBestValues'][0]['offer'];

        $data['lowestInternetPrice'] = '$'.min($data['internetPrices']);
        $data['lowestTvPrice'] = '$'.min($data['tvPrices']);

        array_multisort(array_map(function($element) {
            return $element['speed'];
        }, $data['allData']), SORT_DESC, $data['allData']);

        $data['bestAllSpeed'] = $data['allData'][0]['speed']*self::GBPS_TO_MBPS_MULTIPLIER;
        if($data['bestAllSpeed'] == 0) {
            $data['bestAllSpeed'] = '-';
        }
        $data['bestAllOfferName'] = $data['allData'][0]['offer'];
        $data['bestAllPrice'] = '$'.$data['allData'][0]['price'];

        $data['allInternetRangePriceMin'] = '$'.min($data['internetPrices']);
        $data['allInternetRangePriceMax'] = '$'.max($data['internetPrices']);
        $data['allInternetRangeSpeedMin'] = min($data['internetSpeeds'])*self::GBPS_TO_MBPS_MULTIPLIER;
        $data['allInternetRangeSpeedMax'] = max($data['internetSpeeds'])*self::GBPS_TO_MBPS_MULTIPLIER;

        return $this->prepareBullets($data, $city->Bullets);
    }

    /**
     * @param $data
     * @param $bullets
     * @return array
     */
    private function prepareBullets($data, $bullets)
    {
        $prepared = [];
        foreach($bullets as $bullet) {
            preg_match_all('/{.*?}/',$bullet, $matches);

            if (count($matches[0])>0 && count($matches[0]) == 1) {
                foreach($matches[0] as $match) {
                    $key = str_replace(['{', '}'], '', $match);
                    if(array_key_exists($key, $data)) {
                        $prepared[] = str_replace($match, $data[$key], $bullet);
                    } else {
                        $prepared[] = $bullet;
                    }
                }
            } else {
                foreach($matches[0] as $match) {
                    $toFind = str_replace(['{', '}'], '', $match);
                    if(array_key_exists($toFind, $data)) {
                        $repl[] = $match;
                        $keys[] = $data[str_replace(['{', '}'], '', $match)];
                    }
                }
                $prepared[] = str_replace($repl, $keys, $bullet);
            }
        }

        return $prepared;
    }

    /**
     * @param $data
     * @return CityItem
     */
    private function getCityFromData($data)
    {
        $cityItem = new CityItem();
        $cityItem->Name = $data['city_name'];
        $cityItem->NormalName = $data['city_normal_name'];
        $cityItem->Latitude = $data['latitude'];
        $cityItem->Longitude = $data['longitude'];
        $cityItem->StateCode = $data['state_code'];
        $cityItem->StateName = $data['state_name'];
        $cityItem->Population = $data['population'];
        $cityItem->Zip = trim($data['zip_code']);
        $cityItem->SectionOne = $data['section_one'];
        $cityItem->SectionTwo = $data['section_two'];
        $cityItem->SectionThree = $data['section_three'];
        $cityItem->SectionOneText = $data['section_one_text'];
        $cityItem->SectionTwoText = $data['section_two_text'];
        $cityItem->SectionThreeText = $data['section_three_text'];
        $cityItem->TagLine = str_replace(['$city', '$state'],[$cityItem->NormalName, $cityItem->StateName],$data['tag_lines_content']);
        foreach ($data['bullets'] as $bullet) {
            $cityItem->Bullets[] = str_replace(['$city', '$state'],[$cityItem->NormalName, $cityItem->StateCode],$bullet['content']);
        }

        $cityItem->RelatedCities = $data['related_cities'];

        return $cityItem;
    }

    /**
     * @param $products
     * @return array
     */
    public function getTopProvidersDataFromProducts($products)
    {
        $result = [];
        $providers = $this->getTopInternetProvidersFromProducts($products);
        $top = 0;
        foreach ($providers as $provider) {
            if($top ==self::TOP_PROVIDERS_COUNT) {
                break;
            }
            $result[$provider->Id]['provider'] = $provider;
            $providerId = $provider->Id;
            foreach ($products as $product) {
                if($product->ServiceProviderCategory->Provider->Id == $provider->Id) {
                    $result[$providerId]['products'][] = $product;
                    $result[$providerId]['speeds'][] = ($product->DownloadSpeed) ? $product->DownloadSpeed : 0;
                    $result[$providerId]['spCategoryUrl'] = $product->ServiceProviderCategory->NavigationLink->LinkUrl;
                }
            }
            $result[$providerId]['maxSpeed'] = max($result[$providerId]['speeds'])*self::GBPS_TO_MBPS_MULTIPLIER;
            if($result[$providerId]['maxSpeed'] == 0) {
                $result[$providerId]['maxSpeed'] = '-';
                $result[$providerId]['avgSpeed'] = '-';
            } else {
                $sum=0;
                $cnt = 0;
                foreach($result[$providerId]['speeds'] as $val) {
                    if($val == 0) {
                        continue;
                    }
                    $sum+= $val;
                    $cnt++;
                }
                if($cnt > 0) {
                    $avg = $sum/$cnt;
                    $result[$providerId]['avgSpeed'] = $avg*self::GBPS_TO_MBPS_MULTIPLIER;
                }
            }

            array_multisort(array_map(function($element) {
                return $element->Price;
            }, $result[$providerId]['products']), SORT_ASC, $result[$providerId]['products']);

            $top++;
        }

        return $result;
    }

    /**
     * @param $products
     * @return array
     */
    private function getTopInternetProvidersFromProducts($products)
    {
        $uniqueProviderIds = [];
        $providers = [];
        foreach ($products as $product) {
            if(!in_array($product->ServiceProviderCategory->Provider->Id, $uniqueProviderIds) &&
                in_array($product->ServiceProviderCategory->Category->Id, self::INTERNET_CATEGORIES)
            ) {
                $providers[] = $product->ServiceProviderCategory->Provider;
                array_push($uniqueProviderIds, $product->ServiceProviderCategory->Provider->Id);
            }
        }

        return $providers;
    }
}
