<?php


namespace CYH\Sal\Services\Base;


use CYH\Sal\AdminSettings;

class CacheableService extends BaseService
{
    /**
     * @var AdminSettings|null
     */
    protected $_cachingSettings = null;

    public function __construct()
    {
        parent::__construct();
        $this->_cachingSettings = new AdminSettings();
    }
}