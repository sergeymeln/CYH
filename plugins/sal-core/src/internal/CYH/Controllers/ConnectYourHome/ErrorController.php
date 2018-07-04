<?php


namespace CYH\Controllers\ConnectYourHome;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\UrlTarget;
use CYH\ViewModels\RenderMode;
use CYH\ViewModels\UI\GridItem;

class ErrorController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function SalError()
    {
        $items = [];

        if (have_rows('brands_list', 'options'))
        {
            while (has_sub_field('brands_list', 'options'))
            {
                $brandLogo = !empty(get_sub_field('brand_logo')) ? get_sub_field('brand_logo') : '';
                $brandName = !empty(get_sub_field('brand_name')) ? get_sub_field('brand_name') : '';
                $brandDescription = !empty(get_sub_field('brand_description')) ? get_sub_field('brand_description') : '';
                $brandPhone = !empty(get_sub_field('brand_phone')) ? get_sub_field('brand_phone'): '';

                $item = new GridItem();
                $item->Logo = $brandLogo;
                $item->Title = $brandName;
                $item->DescrRenderMode = RenderMode::DYNAMIC;
                $item->Description = ContentDeserializeHelper::GetDescriptionFromTags($brandDescription);
                $item->ActionButton->Link = HtmlHelper::GetPhoneHref($brandPhone);
                $item->ActionButton->Label = '<i class="glyphicon glyphicon-earphone"></i> ' . $brandPhone;
                $item->ActionButton->Target = HtmlHelper::MapTargetField(UrlTarget::SAME_TAB);
                $item->ActionButton->CssClass = 'brands-btn btn btn-all-brands btn-lg ';

                $items[] = $item;
            }
        }

        $this->View('error/sal-response-error', [
            'list' => $items
        ]);
    }
}