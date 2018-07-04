<?php


namespace CYH\Sal;


class AdminSettings
{
    private $_cachingOptions = [];

    public function __construct()
    {
        $this->_cachingOptions = get_option('sal_cache_menu');
    }

    public function AreBrandsCached()
    {
        return (isset($this->_cachingOptions['brand']) && $this->_cachingOptions['brand'] == true);
    }

    public function ArePackagesForCoSCached()
    {
        return (isset($this->_cachingOptions['packages_by_cos']) && $this->_cachingOptions['packages_by_cos'] == true);
    }
}