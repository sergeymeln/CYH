<?php

namespace CYH\Controllers\ConnectYourHome;

use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Filters\ProductFilter;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ProductsService;
use CYH\Marketing\Helpers\UrlHelper;
use CYH\Marketing\Services\MarketingService;
use CYH\Marketing\Services\StatisticsService;
use CYH\Marketing\Types\StatisticsEventType;

class PageController extends GenericController
{

    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderLanding()
    {
        $this->View('connect-your-home/pages/landing-page', [
        ]);
    }
}