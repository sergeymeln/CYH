<?php

namespace CYH\Marketing\Controllers\ConnectYourHome;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\CategoryFilter;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\Filters\SPCategoriesFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\LinkDestination;
use CYH\Models\Product;
use CYH\Models\ServiceProvider;
use CYH\Marketing\Models\ServiceProviderCategory;
use CYH\Marketing\Models\TopOffer;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\CategoriesService;
use CYH\Sal\Services\ProductsService;
use CYH\Sal\Services\SpCategoriesService;
use CYH\Sal\Services\TopOffersService;
use CYH\Marketing\ViewModels\CYH\AddressSearchResults;
use CYH\Marketing\ViewModels\CYH\ResultsHeaderSection;
use CYH\Marketing\ViewModels\CYH\ResultsTableListItem;
use CYH\Marketing\ViewModels\HeroMsgRenderMode;
use CYH\ViewModels\RenderMode;
use CYH\Marketing\ViewModels\UI\AdditionalDetailsItem;
use CYH\Marketing\ViewModels\UI\Address;
use CYH\Marketing\ViewModels\UI\AddressSearchEmbedded;
use CYH\Marketing\ViewModels\UI\Button;
use CYH\Marketing\ViewModels\UI\DisclaimerItem;
use CYH\ViewModels\UI\GridItem;
use CYH\Marketing\ViewModels\UI\HeaderLink;
use CYH\Marketing\ViewModels\UI\HeaderSectionItem;
use CYH\Marketing\ViewModels\UI\HeroItem;
use CYH\ViewModels\UI\LegalModal;
use CYH\ViewModels\UI\ListItem;
use CYH\Marketing\ViewModels\UI\SimpleListItem;
use CYH\Marketing\ViewModels\UI\TableHeaderItem;
use CYH\Marketing\ViewModels\UI\CityItem;

use CYH\Marketing\Helpers\WPSQLImporter;
use CYH\Marketing\Helpers\UrlHelper;
use CYH\Marketing\Services\MarketingService;

class MarketingsController extends GenericController
{
    protected $spCategoriesService = null;
    protected $prodService = null;
    protected $topOffersService = null;
    protected $categoriesService = null;
    protected $dataTransformerHelper;
    protected $marketingService = null;
    protected $urlHelper = null;
    const INTERNET_USERS_IN_USA = 78.2;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->spCategoriesService = new SpCategoriesService();
        $this->prodService = new ProductsService();
        $this->topOffersService = new TopOffersService();
        $this->categoriesService = new CategoriesService();
        $this->sqlImporter = new WPSQLImporter();
        $this->urlHelper = new UrlHelper();
        $this->marketingService = new MarketingService();
    }

    public function RenderMarketing()
    {
        $data = $this->urlHelper->getCityFromUrl();
        $cityData = $this->marketingService->GetCitiesData($data);
        $city = $this->getCityFromData($cityData);

        $preparedData = [];

        $productFilter = new ProductFilter();
        $productFilter->Zip = $city->Zip;
        $productList = $this->prodService->GetAllProducts($productFilter, CacheSettingsProvider::GetCacheDisabledSettings());
        if(count($productList) ==0) {
            return false;
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['productsForBrand'] = null;

        $preparedData['productList'] = $this->filterProducts($productList);
        $preparedData['providers'] = $this->getProvidersFromProducts($preparedData['productList']);
        $preparedData['productListSorted'] = $this->sortProducts($preparedData['productList']);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['productsForBrand'] = json_encode($preparedData['productListSorted']);

        $preparedData['topProvidersData'] = $this->getTopProvidersDataFromProducts($preparedData['productList']);

        $city->Bullets = $this->getBulletsData($preparedData['productList'], $city);
        $this->View('marketing/marketing-page', [
            'city' => $city,
            'cityData' => $preparedData
        ]);
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
     * @param $allProducts
     * @return array
     */
    private function filterProducts($allProducts)
    {
        $categoryIds = [4,5,7];
        $filteredProducts = [];
        if (count($allProducts) > 0) {
            foreach ($allProducts as $product) {
                if(in_array($product->ServiceProviderCategory->Category->Id, $categoryIds)) {
                    $filteredProducts[] = $product;
                }
            }
        }

        return $filteredProducts;
    }

    /**
     * @param $products
     * @return array
     */
    private function getProvidersFromProducts($products)
    {
        $uniqueProviderIds = [];
        $providers = [];
        foreach ($products as $product) {
            if(!in_array($product->ServiceProviderCategory->Provider->Id, $uniqueProviderIds)) {
                $providers[] = $product->ServiceProviderCategory->Provider;
                array_push($uniqueProviderIds, $product->ServiceProviderCategory->Provider->Id);
            }
        }

        return $providers;
    }

    /**
     * @param $products
     * @return mixed
     */
    private function sortProducts($products)
    {
        array_multisort(array_map(function($element) {
            return $element->Price;
        }, $products), SORT_ASC, $products);

        return $products;
    }

    /**
     * @param $products
     * @return array
     */
    private function getTopProvidersDataFromProducts($products)
    {
        $result = [];
        $providers = $this->getTopInternetProvidersFromProducts($products);
        $top = 0;
        foreach ($providers as $provider) {
            if($top ==5) {
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
            $result[$providerId]['maxSpeed'] = max($result[$providerId]['speeds'])*1000;
            $sum=0;
            foreach($result[$providerId]['speeds'] as $val) {
                $sum+= $val;
            }
            $avg = $sum/count($result[$providerId]['speeds']);
            $result[$providerId]['avgSpeed'] = $avg*1000;
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
        $categoryIds = [4,5];
        $uniqueProviderIds = [];
        $providers = [];
        foreach ($products as $product) {
            if(!in_array($product->ServiceProviderCategory->Provider->Id, $uniqueProviderIds) &&
                in_array($product->ServiceProviderCategory->Category->Id, $categoryIds)
            ) {
                $providers[] = $product->ServiceProviderCategory->Provider;
                array_push($uniqueProviderIds, $product->ServiceProviderCategory->Provider->Id);
            }
        }

        return $providers;
    }

    /**
     * @param $products
     * @param $city
     * @return array
     */
    private function getBulletsData($products, $city)
    {
        $data = [];
        $data['internetPlansCount'] = 0;
        $data['internetSecurityCount'] = 0;
        $data['cityInternetUsers'] = round(((int)$city->Population * self::INTERNET_USERS_IN_USA)/100/1000000,1);
        $data['bestTvValues'] = [];
        $index = 0;
        foreach($products as $prod) {
            if(in_array($prod->ServiceProviderCategory->Category->Id, [4,5])) {
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
            if(in_array($prod->ServiceProviderCategory->Category->Id, [7])) {
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
        $data['avgSpeeds'] = $avg*1000;

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
        $data['avgInternetSpeed'] = $avg*1000;

        $data['bestOfferLowestPrice'] = '$'.$data['bestValues'][0]['price'];
        $data['bestOfferName'] = $data['bestValues'][0]['offer'];

        $data['allBestOfferLowestPrice'] = '$'.$data['allBestValues'][0]['price'];
        $data['allBestOfferName'] = $data['allBestValues'][0]['offer'];

        $data['lowestInternetPrice'] = '$'.min($data['internetPrices']);
        $data['lowestTvPrice'] = '$'.min($data['tvPrices']);

        array_multisort(array_map(function($element) {
            return $element['speed'];
        }, $data['allData']), SORT_ASC, $data['allData']);

        $data['bestAllSpeed'] = $data['allData'][0]['speed']*1000;
        $data['bestAllOfferName'] = $data['allData'][0]['offer'];
        $data['bestAllPrice'] = '$'.$data['allData'][0]['price'];

        $data['allInternetRangePriceMin'] = '$'.min($data['internetPrices']);
        $data['allInternetRangePriceMax'] = '$'.max($data['internetPrices']);
        $data['allInternetRangeSpeedMin'] = min($data['internetSpeeds'])*1000;
        $data['allInternetRangeSpeedMax'] = max($data['internetSpeeds'])*1000;

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
}