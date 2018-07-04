<?php


namespace CYH\Controllers\ConnectYourHome;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Filters\ProductFilter;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\Filters\SPCategoriesFilter;
use CYH\Models\Filters\TopOfferFilter;
use CYH\Models\LinkDestination;
use CYH\Models\Product;
use CYH\Models\ServiceProvider;
use CYH\Models\ServiceProviderCategory;
use CYH\Models\TopOffer;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\CategoriesService;
use CYH\Sal\Services\ProductsService;
use CYH\Sal\Services\SpCategoriesService;
use CYH\Sal\Services\TopOffersService;
use CYH\ViewModels\CYH\AddressSearchResults;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\ViewModels\CYH\ResultsTableListItem;
use CYH\ViewModels\HeroMsgRenderMode;
use CYH\ViewModels\RenderMode;
use CYH\ViewModels\UI\AdditionalDetailsItem;
use CYH\ViewModels\UI\Address;
use CYH\ViewModels\UI\AddressSearchEmbedded;
use CYH\ViewModels\UI\Button;
use CYH\ViewModels\UI\DisclaimerItem;
use CYH\ViewModels\UI\GridItem;
use CYH\ViewModels\UI\HeaderLink;
use CYH\ViewModels\UI\HeaderSectionItem;
use CYH\ViewModels\UI\HeroItem;
use CYH\ViewModels\UI\LegalModal;
use CYH\ViewModels\UI\ListItem;
use CYH\ViewModels\UI\SimpleListItem;
use CYH\ViewModels\UI\TableHeaderItem;

class ServiceProviderController extends GenericController
{
    protected $spCategoriesService = null;
    protected $prodService = null;
    protected $topOffersService = null;
    protected $categoriesService = null;

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
        $this->spCategoriesService = new SpCategoriesService();
        $this->prodService = new ProductsService();
        $this->topOffersService = new TopOffersService();
        $this->categoriesService = new CategoriesService();
    }

    public function RenderAllServiceProviders()
    {
        $filter = new ServiceProviderFilter();
        $spList = $this->spService->GetServiceProviderListSup($filter, CacheSettingsProvider::GetAdminCachingSettings());

        $hero = new HeroItem();
        $hero->HeroImageUrl = get_field('all_brand_hero')['url'];
        $hero->Heading = get_field('brand_heading');
        $hero->HeadingIntro = get_field('brand_copy');
        $hero->HeroMsg = get_field('hero_banner_msg');
        $hero->HeroMsgRenderMode = RenderMode::STRING;
        $hero->GaEventTrackingCode = "ga('send', 'event', 'Call', 'ClicktoCall - All Brands - Header CTA');";
        $hero->Phone = get_field('home_phone_number', 'option');

        $headerSection = new HeaderSectionItem();
        $headerSection->PageHeadingLeft = get_field('page_heading');
        $headerSection->RenderMode = RenderMode::STRING;
        $headerSection->PageStrapline = get_field('page_heading_strapline');

        $items = [];
        //map spList to ui-component viewmodel
        foreach ($spList as $sp) {
            /* @var $sp ServiceProvider */
            $item = new GridItem();
            $item->Logo = $sp->Logo;
            $item->Title = $sp->Name;
            $item->Tagline = $sp->Tagline;
            $item->DescrRenderMode = RenderMode::DYNAMIC;
            $item->Description = ContentDeserializeHelper::GetDescriptionFromTags($sp->Description);

            switch ($sp->NavigationLink->LinkDestination)
            {
                case LinkDestination::PHONE:
                    $label = '<i class="glyphicon glyphicon-earphone"></i> ' . FormatHelper::FormatPhoneNumber($sp->Phone->Number);
                    $link = HtmlHelper::GetPhoneHref($sp->Phone->Number);
                    break;
                case LinkDestination::INTERNAL:
                case LinkDestination::ABSOLUTE:
                default:
                    $label = !empty($sp->NavigationLink->LinkText) ? $sp->NavigationLink->LinkText :'VIEW PLANS';
                    $link = $sp->NavigationLink->LinkUrl;
                    break;
            }

            $item->ActionButton->Link = $link;
            $item->ActionButton->Label = $label;
            $item->ActionButton->Target = HtmlHelper::MapTargetField($sp->NavigationLink->LinkTarget);
            $item->ActionButton->CssClass = 'brands-btn btn btn-all-brands btn-lg';

            $items[] = $item;
        }

        $this->View('service-provider/all-providers', [
            'hero' => $hero,
            'header' => $headerSection,
            'list' => $items
        ]);
    }

    public function RenderServiceProviderCategories()
    {
        /* @var $brand ServiceProvider */
        $brand = $this->spService->GetServiceProvider(get_field('cyh_brand_id'), CacheSettingsProvider::GetAdminCachingSettings());
        $spCategories = $this->spCategoriesService->GetCategoriesBySpSup($brand->Id, CacheSettingsProvider::GetAdminCachingSettings());

        $hero = new HeroItem();
        $hero->HeroImageUrl = $brand->HeroImage;
        $hero->Heading = $brand->Tagline;
        $hero->HeroMsg =  ContentDeserializeHelper::GetDescriptionFromTags($brand->Description);
        $hero->HeroMsgRenderMode = RenderMode::DYNAMIC;
        $hero->GaEventTrackingCode = "ga('send', 'event', 'Call', 'ClicktoCall - One Brand - Header CTA');";
        $hero->Phone = FormatHelper::FormatPhoneNumber($brand->Phone->Number);

        $headerSection = new HeaderSectionItem();
        $headerSection->PageHeadingLeft = 'Brand';
        $headerSection->PageHeadingRight = $brand->Name;
        $headerSection->RenderMode = RenderMode::SEPARATED;
        $headerSection->PageStrapline = $brand->Tagline;
        $headerSection->Description = get_field('brand_description');

        $simpleList = new SimpleListItem();
        $simpleList->AddressSearchEmbedded = new AddressSearchEmbedded(
            FormatHelper::FormatPhoneNumber($brand->Phone->Number),
            "ga('send', 'event', 'Call', 'ClicktoCall - Search Interstitial');"
        );

        // initializing header links and list items
        foreach ($spCategories as $spCategory) {
            /* @var $spCategory ServiceProviderCategory */
            $headerSection->HeaderLinks[] = new HeaderLink('#category_' . $spCategory->Id, $spCategory->Name);

            $listItem = new ListItem();
            $listItem->Logo = $spCategory->Logo;
            $listItem->IdLink = 'category_' . $spCategory->Id;
            $listItem->Title = $spCategory->Name;
            $listItem->Tagline = $spCategory->Tagline;
            $listItem->Description = ContentDeserializeHelper::GetDescriptionFromTags($spCategory->Description);
            $listItem->Price = $spCategory->Price;
            $listItem->StartingAtDescription = $spCategory->PriceDescriptionBegin;
            $listItem->EndingAtDescription = $spCategory->PriceDescriptionEnd;

            switch ($spCategory->NavigationLink->LinkDestination)
            {
                case LinkDestination::PHONE:
                    $label = '<i class="glyphicon glyphicon-earphone"></i> ' . FormatHelper::FormatPhoneNumber($spCategory->Phone->Number);
                    $link = HtmlHelper::GetPhoneHref($label);
                    break;
                case LinkDestination::INTERNAL:
                case LinkDestination::ABSOLUTE:
                default:
                    $label = !empty($spCategory->NavigationLink->LinkText) ? $spCategory->NavigationLink->LinkText :'View Packages';
                    $link = $spCategory->NavigationLink->LinkUrl;
                    break;
            }

            $listItem->ActionButton->Link = $link;
            $listItem->ActionButton->Label = $label;
            $listItem->ActionButton->Target = HtmlHelper::MapTargetField($spCategory->NavigationLink->LinkTarget);

            if (!empty($spCategory->Legal))
            {
                $listItem->TermsAndConditions = new LegalModal('legal' . $spCategory->Id);
                $listItem->TermsAndConditions->Title = 'Terms & Conditions';
                $listItem->TermsAndConditions->Text = $spCategory->Legal;
                $listItem->TermsAndConditions->LegalButton->CssClass = "btn btn-terms";
                $listItem->TermsAndConditions->LegalButton->Label = "Terms & Conditions";
            }

            $simpleList->ListItems[] = $listItem;
        }

        $this->View('service-provider-categories/sp-category-list', [
            'hero' => $hero,
            'header' => $headerSection,
            'list' => $simpleList,
            'disclaimer' => new DisclaimerItem('', $brand->Legal)
        ]);
    }

    public function RenderServiceProviderCatProducts()
    {
        /* @var $brand ServiceProvider */
        $brand = $this->spService->GetServiceProvider(get_field('cyh_brand_id'), CacheSettingsProvider::GetAdminCachingSettings());
        /* @var $spCat ServiceProviderCategory */
        $spCat = $this->spCatService->GetSpCategoriesById(get_field('cyh_sp_category_id'), $brand->Id, CacheSettingsProvider::GetAdminCachingSettings());
        $filter = new ProductFilter();
        $filter->providerId = $brand->Id;

        $productList = $this->prodService->GetProductsBySpAndSpCategory($filter, $spCat->Id, CacheSettingsProvider::GetAdminCachingSettings());

        $hero = new HeroItem();
        $hero->HeroImageUrl = $brand->HeroImage;
        $hero->Heading = $brand->Tagline;
        $hero->HeroMsg = ContentDeserializeHelper::GetDescriptionFromTags($brand->Description);
        $hero->HeroMsgRenderMode = RenderMode::DYNAMIC;
        $hero->GaEventTrackingCode = "ga('send', 'event', 'Call', 'ClicktoCall - One Brand - Header CTA');";
        $hero->Phone = FormatHelper::FormatPhoneNumber($brand->Phone->Number);

        $headerSection = new HeaderSectionItem();
        $headerSection->PageHeadingLeft = $spCat->Category->Name;
        $headerSection->PageHeadingRight = $brand->Name;
        $headerSection->RenderMode = RenderMode::SEPARATED;
        $headerSection->PageStrapline = $spCat->Tagline;
        $headerSection->Description = get_field('brand_description');

        $simpleList = new SimpleListItem();
        $simpleList->AddressSearchEmbedded = new AddressSearchEmbedded(
            FormatHelper::FormatPhoneNumber($brand->Phone->Number),
            "ga('send', 'event', 'Call', 'ClicktoCall - Search Interstitial');"
        );

        // initializing header links and list items
        foreach ($productList as $product) {
            /* @var $product Product */
            $headerSection->HeaderLinks[] = new HeaderLink('#category_' . $product->Id, $product->Name);

            $listItem = new ListItem();
            $listItem->Logo = $product->Logo;
            $listItem->IdLink = 'category_' . $product->Id;
            $listItem->Title = $product->Name;
            $listItem->Tagline = $product->Tagline;
            $listItem->Description = ContentDeserializeHelper::GetDescriptionFromTags($product->Description);
            $listItem->Price = $product->Price;
            $listItem->StartingAtDescription = $product->PriceDescriptionBegin;
            $listItem->EndingAtDescription = $product->PriceDescriptionEnd;
            $formattedPhone = FormatHelper::FormatPhoneNumber($product->Phone->Number);

            $listItem->ActionButton->Link = HtmlHelper::GetPhoneHref($formattedPhone);
            $listItem->ActionButton->Label = '<i class="glyphicon glyphicon-earphone"></i> ' . $formattedPhone;
            $listItem->ActionButton->CssClass = 'btn btn-success btn-lg';

            if (!empty($product->Legal))
            {
                $listItem->TermsAndConditions = new LegalModal('legal' . $product->Id);
                $listItem->TermsAndConditions->Title = 'Terms & Conditions';
                $listItem->TermsAndConditions->Text = $product->Legal;
                $listItem->TermsAndConditions->LegalButton->CssClass = "btn btn-terms";
                $listItem->TermsAndConditions->LegalButton->Label = "Terms & Conditions";
            }

            $simpleList->ListItems[] = $listItem;
        }

        $this->View('products/product-list', [
            'hero' => $hero,
            'header' => $headerSection,
            'list' => $simpleList,
            'disclaimer' => new DisclaimerItem('', $spCat->Legal)
        ]);
    }

    public function RenderCategoryServiceProviders()
    {
        $catId = get_field('cyh_category_id');
        $category = $this->categoriesService->GetCategoryById($catId, CacheSettingsProvider::GetAdminCachingSettings());

        $hero = new HeroItem();
        $hero->HeroImageUrl = $category->HeroImage;
        $hero->Heading = $category->Tagline;
        $hero->HeroMsg = ContentDeserializeHelper::GetDescriptionFromTags($category->Description);
        $hero->HeroMsgRenderMode = RenderMode::DYNAMIC;
        $hero->GaEventTrackingCode = "ga('send', 'event', 'Call', 'ClicktoCall - All Brands - Header CTA');";
        $hero->Phone = get_field('home_phone_number', 'option');

        $headerSection = new HeaderSectionItem();
        $headerSection->PageHeadingLeft = $category->Name;
        $headerSection->PageHeadingRight = "All Brands";
        $headerSection->RenderMode = RenderMode::SEPARATED;

        $items = [];
        $spCatList = $this->spCatService->GetSpCategoriesByCosSup(new SPCategoriesFilter(), $catId, CacheSettingsProvider::GetAdminCachingSettings());

        $btnColor = get_field('color_of_the_button');
        $additionalDetails = $this->GetWpAdditionalDetails();
        //map spList to ui-component viewmodel
        foreach ($spCatList as $spCat) {
            /* @var $spCat ServiceProviderCategory */
            $item = new GridItem();
            $item->Logo = $spCat->Provider->Logo;
            $item->Title = $spCat->Name;
            $item->Tagline = $spCat->Tagline;
            $item->DescrRenderMode = RenderMode::DYNAMIC;
            $item->Description = ContentDeserializeHelper::GetDescriptionFromTags($spCat->Description);

            switch ($spCat->NavigationLink->LinkDestination)
            {
                case LinkDestination::PHONE:
                    $label = FormatHelper::FormatPhoneNumber($spCat->Phone->Number);
                    $link = HtmlHelper::GetPhoneHref($label);
                    break;
                case LinkDestination::INTERNAL:
                case LinkDestination::ABSOLUTE:
                default:
                    $label = !empty($spCat->NavigationLink->LinkText) ? $spCat->NavigationLink->LinkText :'VIEW PLANS';
                    $link = $spCat->NavigationLink->LinkUrl;
                    break;
            }

            $item->ActionButton->Link = $link;
            $item->ActionButton->Label = $label;
            $item->ActionButton->Target = HtmlHelper::MapTargetField($spCat->NavigationLink->LinkTarget);
            $item->ActionButton->CssClass = 'brands-btn btn btn-all-brands btn-lg';
            if (!empty($btnColor))
            {
                $item->ActionButton->BackgroundColorOverride = $btnColor;
            }

            if (isset($additionalDetails[$spCat->Provider->Id])) {
                $item->AdditionalDetails = $additionalDetails[$spCat->Provider->Id];
            } else {
                $item->AdditionalDetails = [];
            }
            $items[] = $item;
        }

        $this->View('service-provider/category-all-providers', [
            'hero' => $hero,
            'header' => $headerSection,
            'list' => $items
        ]);
    }

    public function RenderAddressSearch()
    {
        $address = $this->GetAddressFromRequest();

        $filter = new TopOfferFilter();
        $filter->Zip = $address->Zip;
        $topOffers = $this->topOffersService->GetTopOffers($filter, CacheSettingsProvider::GetCacheDisabledSettings());

        $addressSearchResults = new AddressSearchResults();
        $addressSearchResults->DefaultHeroImage = 'https://www.connectyourhome.com/wp-content/uploads/2016/04/756x397_internetHero_1.jpg';
        $addressSearchResults->TableHeaders = [
            new TableHeaderItem('Provider', 'provider-th'),
            new TableHeaderItem('Plans & Features', 'features-th'),
            new TableHeaderItem('Price', 'price-th'),
        ];
        $addressSearchResults->Header = new ResultsHeaderSection($address);

        //map spList to ui-component viewmodel
        foreach ($topOffers as $to) {
            /* @var $to TopOffer */
            $item = new ResultsTableListItem();
            $item->ProviderId = $to->Provider->Id;
            $item->Logo = $to->Provider->Logo;
            $item->Title = $to->Tagline;
            $item->Features = ContentDeserializeHelper::GetDescriptionFromTags($to->Description);
            $item->Price = $to->Price;
            $item->PriceDescriptionStart = $to->PriceDescriptionBegin;
            $item->PriceDescriptionEnd = $to->PriceDescriptionEnd;
            $item->Disclaimer = $to->Provider->Legal;

            $item->OrderButton = new Button(
                '<i class="glyphicon glyphicon-earphone"></i> ' . FormatHelper::FormatPhoneNumber($to->Phone->Number),
                HtmlHelper::GetPhoneHref(FormatHelper::FormatPhoneNumber($to->Phone->Number)),
                'phone-number btn btn-success btn-lg'
            );

            if (isset($to->NavigationLink) && !empty($to->NavigationLink->LinkUrl))
            {
                $item->MoreInfoButton = new Button(
                    '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> ' . (!empty($to->NavigationLink->LinkText) ? $to->NavigationLink->LinkText : 'More Info'),
                    $to->NavigationLink->LinkUrl,
                    'btn btn-outline',
                    HtmlHelper::MapTargetField($to->NavigationLink->LinkTarget)
                );
            }
            
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

    public function RenderTopBrandsHome()
    {
        $filter = new ServiceProviderFilter();
        $spList = $this->spService->GetServiceProviderListSup($filter, CacheSettingsProvider::GetAdminCachingSettings());
        $randomKeys = array_rand($spList, 8);
        $randomSps = [];
        foreach ($randomKeys as $keyValue)
        {
            $randomSps[] = $spList[$keyValue];
        }

        $this->View('ui-components/top-brands', [
            'list' => $randomSps,
            'brandsLink' => '/brands'
        ]);
    }

    protected function GetWpAdditionalDetails()
    {
        $details = get_field('brand_details');
        $additionalDetails = [];
        foreach ($details as $item) {
            if (count($item['numerical_details']) > 0 && isset($item['brand_id'])) {
                foreach ($item['numerical_details'] as $numItem)
                {
                    $additionalDetails[$item['brand_id']][] = new AdditionalDetailsItem($numItem['title'], $numItem['value']);
                }
            }
        }

        return $additionalDetails;
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