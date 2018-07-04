<?php


namespace CYH\ViewModels;


class ContentNotFound
{
    public $Alert;

    private function __construct(Alert $alert)
    {
        $this->Alert = $alert;
    }

    public static function GetModel($status, $message)
    {
        $alert = new Alert($status, $message, false);
        return new self($alert);
    }
}