<?php


namespace CYH\Controllers\Notifications;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;
use CYH\ViewModels\Alert;

class AlertController extends GenericController
{
   public function __construct(ControllerContext $context)
   {
       parent::__construct($context);
   }

   public function RenderAlert(Alert $alert)
   {
       $this->View('alert', [
          'alert' => $alert
       ]);
   }
}