<?php


namespace CYH\Controllers\ConnectYourHome;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Helpers\ContentDeserializeHelper;
use CYH\Helpers\FormatHelper;
use CYH\Helpers\HtmlHelper;
use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Models\LinkDestination;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\ViewModels\RenderMode;
use CYH\ViewModels\UI\GridItem;

class MaintenancePagesController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function Render404($domain = 'common'){
        $this->RenderBrandsInfo($domain, '404');
    }

    public function RenderComingSoon($domain = 'common'){
        $this->RenderBrandsInfo($domain, 'coming-soon');
    }

    protected function RenderBrandsInfo($domain, $templateName)
    {
        $filter = new ServiceProviderFilter();
        $spList = $this->spService->GetServiceProviderListSup($filter, CacheSettingsProvider::GetAdminCachingSettings());

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

        $this->View($templateName, [
            'list' => $items
        ], $domain);
    }
}