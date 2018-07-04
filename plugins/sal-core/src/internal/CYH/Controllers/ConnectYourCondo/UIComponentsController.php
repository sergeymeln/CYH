<?php


namespace CYH\Controllers\ConnectYourCondo;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\ViewModels\CYH\ResultsHeaderSection;

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
}