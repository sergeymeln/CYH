<?php


namespace CYH\Controllers\OrderSpectrum;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Models\Product;
use CYH\Models\ServiceProvider;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use  CYH\Controllers\OrderSpectrum\HomeController;
use CYH\Controllers\OrderSpectrum\SearchController;

class UIComponentsController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderAddressSearchResultsHeaderSection(ResultsHeaderSection $header)
    {
        $this->View('ui-components/address-search-header', ['header' => $header]);
    }

    public function RenderMenu(ServiceProvider $spInfo)
    {
        $this->View('ui-components/render-menu', ['spInfo' => $spInfo]);
    }

    /**
     * @param $products array|Product
     */
    public function RenderProductsCards($products)
    {
        if(!is_array($products)) {
            $products = [$products];
        }
        $this->View('ui-components/products-cards', ['products' => $products]);
    }

    public function RenderHeroImage(ServiceProvider $spInfo)
    {
        $this->View('ui-components/hero-image', ['spInfo' => $spInfo]);
    }

    public function RenderBreadcrumbs()
    {
        $this->View('ui-components/custom-breadcrumbs', []);
    }
}