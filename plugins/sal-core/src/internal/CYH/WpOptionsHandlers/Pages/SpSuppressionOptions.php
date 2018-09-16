<?php


namespace CYH\WpOptionsHandlers\Pages;


use CYH\Models\Filters\ServiceProviderFilter;
use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\ServiceProviderService;
use CYH\WpOptionsHandlers\Core\OptionsHandler;

class SpSuppressionOptions extends OptionsHandler
{
    protected $spService = null;

    public function __construct()
    {
        $this->spService = new ServiceProviderService();
        $this->internalSettings[parent::PAGE_TITLE_SETTING] = 'SP Suppress';
        $this->internalSettings[parent::MENU_TITLE_SETTING] = 'SP Suppress';
        $this->LoadSettings();
    }

    public static function GetPrefix()
    {
        return 'sp_suppress_';
    }

    public  function InitializeSettings()
    {
        register_setting(
            self::GetOptionStorageKey(), // Option group
            self::GetOptionStorageKey(), // Option name
            array($this, 'SanitizeInput')
        );

        add_settings_section(
            'sal_sp_suppress_section', // ID
            'Service Provider Suppress Settings', // Title
            function () {
                echo "Controls which Service Providers are not displayed on the applicable sites";
            }, // Callback
            $this->GetMenuSlug() // Page
        );

        $spList = $this->spService->GetServiceProviderList(new ServiceProviderFilter(), CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(86400));
        foreach ($spList as $sp) {
            /* @var $sp ServiceProvider */
            add_settings_field(
                self::GetPrefix() . $sp->Id, // ID
                $sp->Name, // Title
                array($this, 'RenderCheckboxSetting'), // Callback
                $this->GetMenuSlug(), // Page
                'sal_sp_suppress_section', // Section
                [
                    'name' => self::GetPrefix() . $sp->Id,
                    'option-name' => self::GetOptionStorageKey()
                ]
            );
        }
    }

    public  function SanitizeInput($input)
    {
        $sanitizedInput = array();
        foreach ($input as $key => $value)
        {
            $sanitizedInput[$key] = $value == 'on' ? true : false;
        }
        return $sanitizedInput;
    }

    protected function LoadSettings()
    {
        $this->wpOptions = get_option(self::GetOptionStorageKey());
    }
}