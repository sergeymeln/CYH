<?php


namespace CYH\SimpleGroupPortal\WpOptionsHandlers\Pages;


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
            'sgp_general_section', // ID
            'General Settings', // Title
            function () {
                echo "Controls simple portal behavior";
            }, // Callback
            $this->GetMenuSlug() // Page
        );

        add_settings_field(
            'general_group_id', // ID
            'Group Id', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sgp_general_section', // Section
            [
                'name' => 'general_group_id',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'The Id of a group which is used across the site',
                'placeholder' => 'Default: 1242270'
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        return array_merge([
            'general_group_id' => '1242270'
        ], parent::GetSettings());
    }

    public function SanitizeInput($input)
    {
        $sanitizedInput = array();
        foreach ($input as $key => $value) {
            $sanitizedInput[$key] = $value;
        }
        return $sanitizedInput;
    }

    protected function LoadSettings()
    {
        $this->wpOptions = get_option(self::GetOptionStorageKey());
    }
}