<?php


namespace CYH\Controllers\Common;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;

class ScriptRenderController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderValidationScript($formSelector, $recaptchaEnabled = false, $domain = 'common')
    {
        $this->View('scripts/validator', [
            'settings' => [
                'recaptchaEnabled' => $recaptchaEnabled,
                'formSelector' => $formSelector,
            ]
        ], $domain);
    }

}