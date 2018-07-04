<?php


namespace CYH\ViewModels\UI;


class LegalModal
{
    public $Id;
    /* @var Button */
    public $LegalButton;
    public $Title;
    public $Text;

    public function __construct($id)
    {
        $this->Id = $id;
        $this->LegalButton = new Button('');
    }
}