<?php


namespace CYH\Models\Core;


class ViewDirRegistryEntry
{
    public $PluginKey;
    public $ViewDir;
    public $ViewDirAlternatives = [];

    public function __construct($pluginKey, $viewDir, $alternatives = [])
    {
        $this->PluginKey = $pluginKey;
        $this->ViewDir = $viewDir;
        $this->ViewDirAlternatives = $alternatives;
    }
}