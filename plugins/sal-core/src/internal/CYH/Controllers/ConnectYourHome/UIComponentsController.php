<?php


namespace CYH\Controllers\ConnectYourHome;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\ViewModels\Alert;
use CYH\ViewModels\ContentNotFound;
use CYH\ViewModels\CYH\ResultsHeaderSection;
use CYH\ViewModels\UI\AddressSearchEmbedded;
use CYH\ViewModels\UI\DisclaimerItem;
use CYH\ViewModels\UI\HeaderSectionItem;
use CYH\ViewModels\UI\HeroItem;
use CYH\ViewModels\UI\SimpleListItem;

class UIComponentsController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    /**
     * @param array|object $items
     */
    public function RenderGrid($items)
    {
        //this check is required as WordPress tends to convert arrays of single items to a single item itself which leads to various problems
        //so we need to check this and convert back
        if (!is_array($items))
        {
            $items = [$items];
        }
        $this->View('ui-components/grid', ['items' => $items]);
    }

    public function RenderHero(HeroItem $item)
    {
        $this->View('ui-components/hero', ['hero' => $item]);
    }

    public function RenderBreadcrumbs()
    {
        $this->View('ui-components/breadcrumbs');
    }

    public function RenderHeaderSection(HeaderSectionItem $item)
    {
        $this->View('ui-components/header-section', ['header' => $item]);
    }

    public function RenderAddressSearchEmbedded(AddressSearchEmbedded $item)
    {
        $this->View('ui-components/address-search-embedded', ['addressSearch' => $item]);
    }

    public function RenderSimpleList(SimpleListItem $item)
    {
        $this->View('ui-components/simple-list', ['simpleList' => $item]);
    }

    public function RenderDisclaimerFooter(DisclaimerItem $item)
    {
        $this->View('ui-components/disclaimer-footer', ['disclaimer' => $item]);
    }

    public function RenderAddressSearchResultsHeaderSection(ResultsHeaderSection $header)
    {
        $this->View('ui-components/address-search-header', ['header' => $header]);
    }

    public function RenderAlert(Alert $alert)
    {
        $this->View('alert', ['alert' => $alert], 'common');
    }

    public function RenderContentNotFound(ContentNotFound $model)
    {
        $this->View('ui-components/content-not-found', ['model' => $model]);
    }

    public function RenderRingPoolScript()
    {
        $this->View('ui-components/ringpool');
    }
}