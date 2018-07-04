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

        $preparedData['productList'] = $this->filterProducts($productList);
        $preparedData['providers'] = $this->getProvidersFromProducts($preparedData['productList']);
        $preparedData['productListSorted'] = $this->sortProducts($preparedData['productList']);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['productsForBrand'] = json_encode($preparedData['productListSorted']);

        $preparedData['topProvidersData'] = $this->getTopProvidersDataFromProducts($preparedData['productList']);
        //echo '<pre>'; print_r($preparedData['providers']);exit;

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
            return $element->ServiceProviderCategory->Provider->Rank;
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
            if($top ==4) {
                break;
            }
            $result[$provider->Id]['provider'] = $provider;
            $providerId = $provider->Id;
            foreach ($products as $product) {
                if($product->ServiceProviderCategory->Provider->Id == $provider->Id) {
                    $result[$providerId]['products'][] = $product;
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
}