<?php


namespace CYH\WpOptionsHandlers\Pages;


use CYH\Sal\Services\CacheSettingsProvider;
use CYH\Sal\Services\SpCategoriesService;
use CYH\WpOptionsHandlers\Core\OptionsHandler;

class SpCatSuppressionOptions extends OptionsHandler
{
    private $spCatService = null;

    public function __construct()
    {
        $this->spCatService = new SpCategoriesService();
        $this->internalSettings[parent::PAGE_TITLE_SETTING] = 'SP Category Suppress';
        $this->internalSettings[parent::MENU_TITLE_SETTING] = 'SP Category Suppress';
        $this->LoadSettings();
    }

    public static function GetPrefix()
    {
        return 'sp_cat_suppress_';
    }

    public  function InitializeSettings()
    {
        register_setting(
            self::GetOptionStorageKey(), // Option group
            self::GetOptionStorageKey(), // Option name
            array($this, 'SanitizeInput') // Sanitize
        );

        add_settings_section(
            'sal_sp_cat_suppress_section', // ID
            'Service Provider Category Suppress Settings', // Title
            function () {
                echo "Controls which Service Provider Categories are not displayed on the applicable sites";
            }, // Callback
            $this->GetMenuSlug() // Page
        );

        $spCatList = $this->spCatService->GetSpCategoriesList(CacheSettingsProvider::GetCacheEnabledSettingsWithLifespan(86400));
        foreach ($spCatList as $spCat) {
            /* @var $spCat ServiceProviderCategory */
            add_settings_field(
                self::GetPrefix() . $spCat->Id, // ID
                $spCat->Name, // Title
                array($this, 'RenderCheckboxSetting'), // Callback
                $this->GetMenuSlug(), // Page
                'sal_sp_cat_suppress_section', // Section
                [
                    'name' => self::GetPrefix() . $spCat->Id,
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