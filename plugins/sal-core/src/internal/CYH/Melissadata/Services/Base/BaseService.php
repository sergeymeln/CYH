<?php


namespace CYH\Melissadata\Services\Base;


use CYH\Melissadata\MDRepository;
use CYH\Melissadata\MDSettings;

class BaseService
{
    protected $_mdRepository = null;

    public function __construct()
    {
        $this->_mdRepository = new MDRepository(MDSettings::GetSettings());
    }
}