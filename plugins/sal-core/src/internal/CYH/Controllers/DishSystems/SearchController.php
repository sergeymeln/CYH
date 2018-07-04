<?php


namespace CYH\Controllers\DishSystems;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Address;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\Product;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\Sal\Services\TopOffersService;
use CYH\ViewModels\CYH\AddressSearchResults;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\ViewModels\CYH\ResultsTableListItem;
use CYH\ViewModels\UI\Button;
use CYH\ViewModels\UI\TableHeaderItem;

class SearchController extends GenericController
{
    protected $productsService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->productsService = new ProductsService();
    }

    public function RenderAddressSearch($spId)
    {
        $address = $this->GetAddressFromRequest();


        $filter = new ProductFilter();
        $filter->Zip = $address->Zip;

        $products = $this->productsService->GetSpProducts($filter, $spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $addressSearchResults = new AddressSearchResults();
        $addressSearchResults->DefaultHeroImage = 'https://www.connectyourhome.com/wp-content/uploads/2016/04/756x397_internetHero_1.jpg';
        $addressSearchResults->TableHeaders = [
            new TableHeaderItem('Provider', 'provider-th'),
            new TableHeaderItem('Plans & Features', 'features-th'),
            new TableHeaderItem('Price', 'price-th'),
        ];
        $addressSearchResults->Header = new ResultsHeaderSection($address);

        //map spList to ui-component viewmodel
        foreach ($products as $product) {
            /* @var $product Product */
            $item = new ResultsTableListItem();
            $item->ProviderId = $product->ServiceProviderCategory->Provider->Id;
            $item->Logo = $product->HeroImage;
            $item->Title = $product->Tagline;
            $item->Features = ContentDeserializeHelper::GetDescriptionFromTags($product->Description);
            $item->Price = $product->Price;
            $item->PriceDescriptionStart = $product->PriceDescriptionBegin;
            $item->PriceDescriptionEnd = $product->PriceDescriptionEnd;
            $item->Disclaimer = $product->ServiceProviderCategory->Legal;

            $item->OrderButton = new Button(
                '<i class="glyphicon glyphicon-earphone"></i> ' . FormatHelper::FormatPhoneNumber($product->Phone->Number),
                HtmlHelper::GetPhoneHref(FormatHelper::FormatPhoneNumber($product->Phone->Number)),
                'phone-number btn btn-green btn-lg'
            );

            if (!empty($item->Disclaimer))
            {
                $item->ViewDisclaimerButton = new Button(
                    'View Disclaimer',
                    '#',
                    'disclaimer'
                );
            }

            $addressSearchResults->TableItems[] = $item;
        }

        $this->View('search/address-to-results', [
            'addressSearch' => $addressSearchResults
        ]);
    }

    protected function GetAddressFromRequest(): Address
    {
        $address = new Address();
        $address->Zip = $_REQUEST['zip'];
        $address->State = $_REQUEST['administrative_area_level_1'];
        $address->City = $_REQUEST['locality'];
        $address->Street = $_REQUEST['street'];
        $address->Route = $_REQUEST['route'];
        $address->Suite = $_REQUEST['suite'];

        return $address;
    }
}