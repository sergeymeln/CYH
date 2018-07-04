<?php


namespace CYH\ViewModels;


use CYH\Helpers\LinkHelper;

class AddressSearch
{
    public $WidgetId;
    public $ExistingAddress = '';
    public $ExistingAptNo = '';
    private $searchLink;
    private $urlParams;

    public function __construct($searchLink, $widgetId = null, array $urlParams = [])
    {
        $this->WidgetId = is_null($widgetId) ? time() : $widgetId;
        $this->searchLink =  $searchLink;
        $this->urlParams = $urlParams;
    }

    public function GetSearchLink()
    {
        $params = array_merge($this->urlParams, ['addrStore' => $this->WidgetId]);
        return LinkHelper::AppendQueryParams($this->searchLink, $params);
    }
}