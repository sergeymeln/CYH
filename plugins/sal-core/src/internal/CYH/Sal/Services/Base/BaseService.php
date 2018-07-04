<?php


namespace CYH\Sal\Services\Base;


use CYH\Sal\Repositories\SalRepository;
use CYH\Sal\Settings;

class BaseService
{
    protected $_salConnector = null;

    public function __construct()
    {
        $this->_salConnector = new SalRepository(Settings::GetSalSettings());
    }
}