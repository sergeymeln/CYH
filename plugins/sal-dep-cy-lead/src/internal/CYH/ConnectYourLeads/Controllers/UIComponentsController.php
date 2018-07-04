<?php

namespace CYH\ConnectYourLeads\Controllers;


use CYH\Context\Base\ControllerContext;
use CYH\Controllers\Core\GenericController;

class UIComponentsController extends GenericController
{
    public function __construct(ControllerContext $context)
    {
        parent::__construct($context);
    }

    public function RenderNegativeKeywords($negativeKeywordsFile)
    {
        if (($handle = fopen($negativeKeywordsFile, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $keywordsArr[] = $data;
            }
            $this->AddViewData('keywordsArr',  $keywordsArr);
            fclose($handle);
        }

        $this->View('ui-components/negative-keywords');
    }
}