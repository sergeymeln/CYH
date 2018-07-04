<?php


namespace CYH\WpOptionsHandlers\Pages\GroupPortal;


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
            'gp_general_section', // ID
            'General Settings', // Title
            function () {
                echo "Specifies the behavior for Group Portal section of site";
            }, // Callback
            $this->GetMenuSlug() // Page
        );


        add_settings_field(
            'gp_folder', // ID
            'Group Portal Folder', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'gp_general_section', // Section
            [
                'name' => 'gp_folder',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'The folder that is being used for the group portal pages <br> You can leave it empty to use default one',
                'placeholder' => 'Default: /auth/'
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        $mergedSettings = array_merge([
            'gp_folder' => '/auth/'
        ], parent::GetSettings());
        if (empty($mergedSettings['gp_folder']))
        {
            $mergedSettings['gp_folder'] = '/auth/';
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