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
        $plans = $this->getCustomFields();
        $this->View('connect-your-home/pages/landing-page', [
            'plans' => $plans
        ]);
    }

    private function getCustomFields()
    {
        $plans = [];
        $counter = 0;
        if( have_rows('section') ){

            while ( have_rows('section') ) {
                the_row();

                $plans[$counter]['logo'] = get_sub_field('logo');
                $plans[$counter]['providerPlanTitle'] = get_sub_field('provider_plan_title');
                $plans[$counter]['planBullets'] = get_sub_field('plan_bullets');
                $plans[$counter]['planPrice'] = get_sub_field('plan_price');
                $plans[$counter]['phoneNumber'] = get_sub_field('phone_number');
                $plans[$counter]['disclaimer'] = get_sub_field('disclaimer');
                $plans[$counter]['exclusiveOfferDetails'] = get_sub_field('exclusive_offer_details');
                $plans[$counter]['giftLink'] = get_sub_field('gift_link');
                $plans[$counter]['priceStart'] = get_sub_field('price_start');
                $plans[$counter]['priceEnd'] = get_sub_field('price_end');
                $plans[$counter]['showAsterisk'] = get_sub_field('show_asterisk');
                $counter++;
            }
        }

        return $plans;
    }
}