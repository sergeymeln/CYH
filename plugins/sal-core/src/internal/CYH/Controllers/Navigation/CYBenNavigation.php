<?php


namespace CYH\Controllers\Navigation;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\Navigation\RebateGiftUrl;
use CYH\ViewModels\CYBen\TopNavMenu;

class CYBenNavigation extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderTopMenu(TopNavMenu $model)
    {
        $url = RebateGiftUrl::GetMyAccountLink($model->GroupInfo);
        $myAccUrl = RebateGiftUrl::AppendCPTData($url, $model->Cpt);

        $this->View('navigation/top-nav', [
            'myAccUrl' => $myAccUrl,
            'topNavMenu' => $model
        ]);
    }
}