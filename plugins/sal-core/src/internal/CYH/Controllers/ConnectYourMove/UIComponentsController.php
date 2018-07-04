<?php


namespace CYH\Controllers\ConnectYourMove;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;

class UIComponentsController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderSlogan()
    {
        $this->View('ui-components/slogan', [
            'sloganText' => 'Just One Call To Move It All'
        ]);
    }
}