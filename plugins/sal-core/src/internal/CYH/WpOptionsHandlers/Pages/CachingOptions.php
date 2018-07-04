<?php

namespace CYH\WpOptionsHandlers\Pages;

use CYH\WpOptionsHandlers\Core\OptionsHandler;

class CachingOptions extends OptionsHandler
{
    public function __construct()
    {
        $this->internalSettings[parent::PAGE_TITLE_SETTING] = 'Cache Settings';
        $this->internalSettings[parent::MENU_TITLE_SETTING] = 'Cache Settings';
        $this->LoadSettings();
    }

    public  function InitializeSettings()
    {
        register_setting(
            self::GetOptionStorageKey(), // Option group
            self::GetOptionStorageKey(), // Option name
            array($this, 'SanitizeInput') // Sanitize
        );

        add_settings_section(
            'sal_caching_section', // ID
            'Caching Settings', // Title
            function () {
                echo 'Controls whether it is required to cache SAL requests';
            }, // Callback
            $this->GetMenuSlug() // Page
        );

        add_settings_field(
            'sal_cache_enable', // ID
            'Enable Caching of SAL requests', // Title
            array($this, 'RenderCheckboxSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sal_caching_section', // Section
            [
                'name' => 'sal_cache_enable',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'Please note that caching will be enabled only in methods that support caching',
            ]
        );

        add_settings_field(
            'sal_cache_lifetime', // ID
            'Cache Lifetime (in seconds)', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sal_caching_section', // Section
            [
                'name' => 'sal_cache_lifetime',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'Please note that the value is the maximum time the cache can be stored in the system',
                'placeholder' => 'Default: 600'
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        return array_merge([
            'sal_cache_enable' => false,
            'sal_cache_lifetime' => 600
        ], parent::GetSettings());
    }

    public  function SanitizeInput($input)
    {
        $sanitizedInput = array();

        if (isset($input['sal_cache_enable']) && $input['sal_cache_enable'] == 'on') {
            $sanitizedInput['sal_cache_enable'] = true;
        } else {
            $sanitizedInput['sal_cache_enable'] = false;
        }
        if (isset($input['sal_cache_lifetime']) && !empty($input['sal_cache_lifetime']))
        {
            $sanitizedInput['sal_cache_lifetime'] = $input['sal_cache_lifetime'];
        }

        return $sanitizedInput;
    }

    protected function LoadSettings()
    {
        $this->wpOptions = get_option(self::GetOptionStorageKey());
    }
}