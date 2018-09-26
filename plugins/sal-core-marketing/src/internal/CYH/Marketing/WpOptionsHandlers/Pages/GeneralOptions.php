<?php


namespace CYH\Marketing\WpOptionsHandlers\Pages;


use CYH\Models\Core\Environment;
use CYH\WpOptionsHandlers\Core\OptionsHandler;

class GeneralOptions extends OptionsHandler
{
    public function __construct()
    {
        $this->internalSettings[parent::PAGE_TITLE_SETTING] = 'General';
        $this->internalSettings[parent::MENU_TITLE_SETTING] = 'General';
        $this->LoadSettings();
    }

    public function InitializeSettings()
    {
        register_setting(
            self::GetOptionStorageKey(), // Option group
            self::GetOptionStorageKey(), // Option name
            array($this, 'SanitizeInput') // Sanitize
        );

        add_settings_section(
            'ic_general_section', // ID
            'General Settings', // Title
            function () {
                echo "Internet+City general settings";
            }, // Callback
            $this->GetMenuSlug() // Page
        );


        add_settings_field(
            'internet_city_show_map', // ID
            'Show Google Map on frontend', // Title
            array($this, 'RenderCheckboxSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'ic_general_section', // Section
            [
                'name' => 'internet_city_show_map',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'Show Google Map on frontend',
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        return array_merge([
            'internet_city_show_map' => false,
        ], parent::GetSettings());
    }

    public function SanitizeInput($input)
    {
        $sanitizedInput = array();
        foreach ($input as $key => $value) {
            $sanitizedInput[$key] = $value;
        }
        if (isset($input['internet_city_show_map']) && $input['internet_city_show_map'] == 'on') {
            $sanitizedInput['internet_city_show_map'] = true;
        } else {
            $sanitizedInput['internet_city_show_map'] = false;
        }
        return $sanitizedInput;
    }

    protected function LoadSettings()
    {
        $this->wpOptions = get_option(self::GetOptionStorageKey());
    }
}