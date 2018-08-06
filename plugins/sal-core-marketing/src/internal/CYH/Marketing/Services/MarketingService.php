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
    const OVERLOAD_MBPS_TO_GBPS_MULTIPLIER = 0.001;
    const OVERLOAD_MBPS_NUMBER = 1024;
    const CACHE_LIVING_TIME = 86400;

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
        $biggestCities = $this->marketingRepository->GetBiggestCitiesInState($citiesData);
        $bigCitiesIds = [];
        if (count($biggestCities)>0) {
            foreach ($biggestCities as $bigCity) {
                $bigCitiesIds[] = $bigCity['id'];
                $citiesData['biggest_cities'][] = $this->getRelatedLinkData($bigCity);
            }
        }

        if (false === $this->getCachedCitiesData(md5('related_'.$citiesData['city_normal_name'].$citiesData['state_code']))) {
            $relatedCities = $this->marketingRepository->GetRelatedCities($citiesData,$bigCitiesIds);
            foreach($relatedCities as $relCity) {
                $citiesData['related_cities'][] = $this->getRelatedLinkData($relCity);
            }
            $this->cacheCitiesData($citiesData['related_cities'],md5('related_'.$citiesData['city_normal_name'].$citiesData['state_code']));
        } else {
            $citiesData['related_cities'] = $this->getCachedCitiesData(md5('related_'.$citiesData['city_normal_name'].$citiesData['state_code']));
        }

        return $this->getCityFromData($citiesData);
    }

    private function getCachedCitiesData($key)
    {
        return get_transient($key);
    }

    private function cacheCitiesData($relatedCities,$key)
    {
        return set_transient($key, $relatedCities);
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
        $matchedCities = [];
        foreach($result as $city) {
            if($city['is_published'] == 0) {
                $cities[] = $city;
            } else {
                $matchedCities[]=$city;
            }
        }

        if(count($cities) == 0 && count($matchedCities) == 0) {
            return false;
        }

        if(count($matchedCities)>0) {
            usort($matchedCities, function($a, $b){
                return ($a['population'] > $b['population']) ? -1 : 1;
            });

            return $matchedCities[0];
        }

        $nearCities=[];
        if (false === $this->getCachedCitiesData(md5('nearest_published_'.$cities[0]['city_normal_name'].$cities[0]['state_code']))) {
            $result = $this->marketingRepository->getNearestPublishedCity($cities[0]);

            foreach($result as $city) {
                $nearCities[] = $city;
            }
            $this->cacheCitiesData($nearCities,md5('nearest_published_'.$cities[0]['city_normal_name'].$cities[0]['state_code']));
        } else {
            $nearCities = $this->getCachedCitiesData(md5('nearest_published_'.$cities[0]['city_normal_name'].$cities[0]['state_code']));
        }


        if(count($nearCities) == 0) {
            return false;
        }

        return $nearCities[0];
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
        return 'Find local cable TV and internet providers in '.$cityData['city_normal_name'].', '.$cityData['state_name'].'. Call 833-585-9178 for high-speed internet service providers.';
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
        $data['cityInternetUsers'] = $this->getInternetUsersCount($city->Population);
        $data['bestTvValues'] = [];
        $data['tvPlansCount'] = 0;
        $index = 0;
        $tvProviders = [];
        $securityProviders = [];
        foreach($products as $prod) {
            if(in_array($prod->ServiceProviderCategory->Category->Id, self::INTERNET_CATEGORIES)) {
                $data['internetPlansCount']++;
                $data['internetSpeeds'][]=($prod->DownloadSpeed) ? $prod->DownloadSpeed : 0;
                $data['internetPrices'][]=$prod->Price;
                preg_match('/Security/i', $prod->ServiceProviderCategory->Provider->Legal, $matches);
                if(count($matches) > 0 && !in_array($prod->ServiceProviderCategory->Provider->Id,$securityProviders)) {
                    $data['internetSecurityCount']++;
                    array_push($securityProviders, $prod->ServiceProviderCategory->Provider->Id);
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
                if(!in_array($prod->ServiceProviderCategory->Provider->Id, $tvProviders)) {
                    $data['tvPlansCount']++;
                    array_push($tvProviders, $prod->ServiceProviderCategory->Provider->Id);
                }
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
        $data['avgSpeeds'] = $this->getFormattedSpeed($avg);

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
        $data['avgInternetSpeed'] = $this->getFormattedSpeed($avg);

        $data['bestOfferLowestPrice'] = '$'.$data['bestValues'][0]['price'];
        $data['bestOfferName'] = $data['bestValues'][0]['offer'];

        $data['allBestOfferLowestPrice'] = '$'.$data['allBestValues'][0]['price'];
        $data['allBestOfferName'] = $data['allBestValues'][0]['offer'];

        $data['lowestInternetPrice'] = '$'.min($data['internetPrices']);
        if(is_array($data['tvPrices']) && count($data['tvPrices'])>0) {
            $data['lowestTvPrice'] = '$'.min($data['tvPrices']);
        } else {
            $data['lowestTvPrice'] = '-';
        }

        array_multisort(array_map(function($element) {
            return $element['speed'];
        }, $data['allData']), SORT_DESC, $data['allData']);

        $data['bestAllSpeed'] = $this->getFormattedSpeed($data['allData'][0]['speed']);

        $data['bestAllOfferName'] = $data['allData'][0]['offer'];
        $data['bestAllPrice'] = '$'.$data['allData'][0]['price'];

        $data['allInternetRangePriceMin'] = '$'.min($data['internetPrices']);
        $data['allInternetRangePriceMax'] = '$'.max($data['internetPrices']);
        $data['allInternetRangeSpeedMin'] = $this->getFormattedSpeed(min($data['internetSpeeds']));
        $data['allInternetRangeSpeedMax'] = $this->getFormattedSpeed(max($data['internetSpeeds']));

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
        $skipBulletsData = ['-','0'];
        foreach($bullets as $bullet) {
            if(preg_match('/exclusive offers/i', $bullet)) {
                continue;
            }
            preg_match_all('/{.*?}/',$bullet, $matches);

            if (count($matches[0])>0 && count($matches[0]) == 1) {
                foreach($matches[0] as $match) {
                    $key = str_replace(['{', '}'], '', $match);
                    if(in_array($data[$key], $skipBulletsData)) {
                        continue;
                    }
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
        $cityItem->BiggestCitiesInState = $data['biggest_cities'];

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
            $speedData = $this->getSpeedDataForTopProviders($result[$providerId]['speeds']);
            $result[$providerId]['maxSpeed'] = $speedData['maxSpeed'];
            $result[$providerId]['avgSpeed'] = $speedData['avgSpeed'];
            $result[$providerId]['speedUnitsAvg'] = $speedData['speedUnitsAvg'];
            $result[$providerId]['speedUnitsMax'] = $speedData['speedUnitsMax'];

            usort($result, function($a, $b){
                if($a['provider']->Rank == $b['provider']->Rank) {
                   return strcmp($a["provider"]->Name, $b["provider"]->Name);
                } else {
                    return ($a['provider']->Rank < $b['provider']->Rank) ? -1 : 1;
                }
            });

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

    private function getFormattedSpeed($speed) {
        if($speed >0 ) {
            if($speed < self::OVERLOAD_MBPS_NUMBER) {
                $speed = round($speed,0).' Mbps';
            } else {
                $speed = round($speed * self::OVERLOAD_MBPS_TO_GBPS_MULTIPLIER,0).' Gbps';
            }
        } else {
            $speed = '-';
        }

        return $speed;
    }

    private function getSpeedDataForTopProviders($speeds)
    {
        $data = [];
        $data['maxSpeed'] = max($speeds);
        if($data['maxSpeed'] < self::OVERLOAD_MBPS_NUMBER) {
            $data['maxSpeed'] = round($data['maxSpeed'],0);
            $data['speedUnitsMax'] = ' Mbps';
        } else {
            $data['maxSpeed'] = round($data['maxSpeed'] * self::OVERLOAD_MBPS_TO_GBPS_MULTIPLIER,0);
            $data['speedUnitsMax'] = ' Gbps';
        }
        if($data['maxSpeed'] == 0) {
            $data['maxSpeed'] = '-';
            $data['avgSpeed'] = '-';
            $data['speedUnitsMax'] = '';
        } else {
            $sum=0;
            $cnt = 0;
            foreach($speeds as $val) {
                if($val == 0) {
                    continue;
                }
                $sum+= $val;
                $cnt++;
            }
            if($cnt > 0) {
                $avg = $sum/$cnt;
                $data['avgSpeed'] = round($avg,0);

                if($avg < self::OVERLOAD_MBPS_NUMBER) {
                    $data['avgSpeed'] = round($avg,0);
                    $data['speedUnitsAvg'] = ' Mbps';
                } else {
                    $data['avgSpeed'] = round($avg * self::OVERLOAD_MBPS_TO_GBPS_MULTIPLIER,0);
                    $data['speedUnitsAvg'] = ' Gbps';
                }
            }
        }

        return $data;
    }

    private function getInternetUsersCount($population)
    {
        $usersCount = '';
        $isMillion = round(((int)$population * self::INTERNET_USERS_IN_USA)/100/1000000,1);
        if($isMillion == 0) {
            if((1000 <= (int)$population) && ((int)$population <=999999)) {
                $usersCount = round(((int)$population * self::INTERNET_USERS_IN_USA)/100/1000,1);
                $usersCount = $usersCount.' thousand';
            } else {
                $usersCount = (int)$population;
            }
        } else {
            $usersCount = $isMillion.' million';
        }

        return $usersCount;

    }

    /**
     * @return string
     */
    public function getTermsTitle()
    {
        return 'Offers Terms and Conditions';
    }

    /**
     * @return string
     */
    public function getTermsDescription()
    {
        return 'Offers Terms and Conditions';
    }

    public function isUniquePage()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $parts = explode('/', $url['path']);

        $city = $this->getCityFromUrl($parts);
        if($city['section_two_text'] != '') {
            return true;
        }

        return false;
    }
}
