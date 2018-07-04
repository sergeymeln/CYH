<?php


namespace CYH\WpOptionsHandlers\Pages;


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
            'sal_general_section', // ID
            'General Settings', // Title
            function () {
                echo "Controls general SAL plugin behavior";
            }, // Callback
            $this->GetMenuSlug() // Page
        );

        add_settings_field(
            'general_environment', // ID
            'Environment', // Title
            array($this, 'RenderRadioSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sal_general_section', // Section
            [
                'name' => 'general_environment',
                'option-name' => self::GetOptionStorageKey(),
                'values' => [
                    Environment::TEST => 'Test (<a href="http://mgmt.servicearealookup.com/" target="_blank">http://mgmt.servicearealookup.com/</a>)',
                    Environment::LIVE => 'Live (<a href="https://admin.servicearealookup.com/" target="_blank">https://admin.servicearealookup.com/</a>)'
                ],
                'selectDefault' => !isset($this->wpOptions['general_environment']),
                'description' => 'Please be careful while switching SAL environment as this may significantly impact some of site\'s functionality (registration, logging in, etc.)'
            ]
        );

        add_settings_field(
            'general_api_key', // ID
            'Api Key', // Title
            array($this, 'RenderTextareaSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sal_general_section', // Section
            [
                'name' => 'general_api_key',
                'option-name' => self::GetOptionStorageKey(),
                'rows' => 5,
                'cols' => 80,
                'description' => 'The key that is generated in the API Clients section on the SAL management portal. <br> You can leave it empty to use default one',
                'placeholder' => 'Default: using www.connectyourhome.com key'
            ]
        );

        add_settings_field(
            'general_domain', // ID
            'Domain', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sal_general_section', // Section
            [
                'name' => 'general_domain',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'The domain should be exactly the same as one created on the SAL management portal and should include http:// or https:// before domain name. Otherwise the key won\'t work properly <br> You can leave it empty to use default one',
                'placeholder' => 'Default: https://www.connectyourhome.com'
            ]
        );

        add_settings_field(
            'general_error_page', // ID
            'Static Error Page', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'sal_general_section', // Section
            [
                'name' => 'general_error_page',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'Please enter the relative link to the page that will be shown if SAL call has encountered error',
                'placeholder' => 'Default: /no-response'
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        return array_merge([
            'general_error_page' => '/no-response'
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