<?php


namespace CYH\Controllers\OrderSpectrum;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Address;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\TopOffer;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\TopOffersService;
use CYH\SimpleGroupPortal\WpOptionsHandlers\Pages\GeneralOptions;
use CYH\ViewModels\CYH\AddressSearchResults;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\ViewModels\CYH\ResultsTableListItem;
use CYH\ViewModels\UI\Button;
use CYH\ViewModels\UI\TableHeaderItem;

class SearchController extends GenericController
{
    protected $topOffersService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->topOffersService = new TopOffersService();
    }

    public function RenderAddressSearch()
    {

        $spId = \CYH\WpOptionsHandlers\Pages\SingleProvider\GeneralOptions::GetSettings()['spp_id'];
        $address = $this->GetAddressFromRequest();
        $filter = new TopOfferFilter();

        $filter->GroupId = GeneralOptions::GetSettings()['general_group_id'];
        $to = $this->topOffersService->GetTopOffers($filter, CacheSettingsProvider::GetCacheDisabledSettings());
        $spInfo = $this->spService->GetServiceProvider($spId, CacheSettingsProvider::GetCacheDisabledSettings());

        $addressSearchResults = new AddressSearchResults();
        $addressSearchResults->DefaultHeroImage = 'https://www.connectyourhome.com/wp-content/uploads/2016/04/756x397_internetHero_1.jpg';
        $addressSearchResults->TableHeaders = [
            new TableHeaderItem('Provider', 'provider-th'),
            new TableHeaderItem('Plans & Features', 'features-th'),
            new TableHeaderItem('Price', 'price-th'),
        ];

        $addressSearchResults->Header = new ResultsHeaderSection($address);

        if (!empty($to) )
        {
            foreach ($to as $product) {
                /* @var $product TopOffer */
                $item = new ResultsTableListItem();
                $item->ProviderId = $product->ServiceProviderCategory->Provider->Id;
                $item->Logo = $product->Logo;
                $item->Title = $product->Tagline;
                $item->Features = ContentDeserializeHelper::GetDescriptionFromTags($product->Description);
                $item->Price = $product->Price;
                $item->PriceDescriptionStart = $product->PriceDescriptionBegin;
                $item->PriceDescriptionEnd = $product->PriceDescriptionEnd;
                $item->Disclaimer = $product->ServiceProviderCategory->Legal;


                $item->OrderButton = new Button(
                    '<i class="glyphicon glyphicon-earphone"></i> ' . FormatHelper::FormatPhoneNumber($product->Phone->Number),
                    HtmlHelper::GetPhoneHref(FormatHelper::FormatPhoneNumber($product->Phone->Number)),
                    'phone-number btn btn-success btn-lg'
                );

                if (!empty($item->Disclaimer)) {
                    $item->ViewDisclaimerButton = new Button(
                        'View Disclaimer',
                        '#',
                        'disclaimer'
                    );
                }

                $addressSearchResults->TableItems[] = $item;
            }
        }

        $this->View('search/address-to-results', [
            'addressSearch' => $addressSearchResults,
            'spInfo' =>$spInfo,
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

