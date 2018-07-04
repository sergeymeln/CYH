<?php


namespace CYH\WpOptionsHandlers\Pages\SingleProvider;


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
            'spp_general_section', // ID
            'General Settings', // Title
            function () {
                echo "Specifies the ID of a provider on site";
            }, // Callback
            $this->GetMenuSlug() // Page
        );


        add_settings_field(
            'spp_id', // ID
            'Group Portal Folder', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'spp_general_section', // Section
            [
                'name' => 'spp_id',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'The ID of the provider in SAL',
                'placeholder' => 'Default: 57'
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        $mergedSettings = array_merge([
            'spp_id' => '57'
        ], parent::GetSettings());
        if (empty($mergedSettings['spp_id']))
        {
            $mergedSettings['spp_id'] = '57';
        }

        return $mergedSettings;
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