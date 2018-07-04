<?php


namespace CYH\Controllers\Common;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\Parsers\SectionBase;
use CYH\ViewModels\AddressSearch;
use CYH\ViewModels\Alert;

class CommonUIComponents extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    /**
     * @param array|object $items
     * @param string $domain
     * @param string $subtemplate
     */
    public function RenderDescription($items, $domain = 'common', $subtemplate = 'common')
    {
        if (!is_array($items))
        {
            $items = [$items];
        }
        $this->View('description', [
            'items' => $items,
            'domain' => $domain,
            'subtemplate' => $subtemplate
        ], $domain);
    }

    public function RenderDescriptionVariant(SectionBase $item, $domain, $subtemplate)
    {
        $templateName = 'description/';
        if (!empty($subtemplate))
        {
            $templateName .= $subtemplate . '/';
        }
        $this->View($templateName . $item->GetTemplateKey(), [
            'item' => $item
        ], $domain);
    }

    public function RenderAlert(Alert $alert, $domain = 'common')
    {
        $this->View('alert', [
            'alert' => $alert
        ], $domain);
    }

    public function RenderAddressSearchBox(AddressSearch $addressSearch, $domain = 'common')
    {
        $this->View('address-search', [
            'addressSearch' => $addressSearch
        ], $domain);
    }
}