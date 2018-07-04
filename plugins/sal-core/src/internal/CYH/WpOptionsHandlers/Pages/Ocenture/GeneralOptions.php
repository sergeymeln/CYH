<?php


namespace CYH\WpOptionsHandlers\Pages\Ocenture;


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
            'ocenture_general_section', // ID
            'General Settings', // Title
            function () {
                echo "Controls general Ocenture service behavior";
            }, // Callback
            $this->GetMenuSlug() // Page
        );

        add_settings_field(
            'general_environment', // ID
            'Environment', // Title
            array($this, 'RenderRadioSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'ocenture_general_section', // Section
            [
                'name' => 'general_environment',
                'option-name' => self::GetOptionStorageKey(),
                'values' => [
                    Environment::TEST => 'Test (<a href="https://ocenture.net.st1.ocenture.com/webservice/soap/AM2/?wsdl" target="_blank">https://ocenture.net.st1.ocenture.com/webservice/soap/AM2/?wsdl</a>)',
                    Environment::LIVE => 'Live (<a href="https://ocenture.net/webservice/soap/AM2/?wsdl" target="_blank">https://ocenture.net/webservice/soap/AM2/?wsdl</a>)'
                ],
                'selectDefault' => !isset($this->wpOptions['general_environment']),
                'description' => 'Please be careful while switching Ocenture environment as this may significantly impact site\'s functionality that depends on these settings'
            ]
        );

        add_settings_field(
            'general_client_id', // ID
            'Client ID', // Title
            array($this, 'RenderTextInputSetting'), // Callback
            $this->GetMenuSlug(), // Page
            'ocenture_general_section', // Section
            [
                'name' => 'general_client_id',
                'option-name' => self::GetOptionStorageKey(),
                'description' => 'The Client ID provided by Ocenture<br> You can leave it empty to use default one',
                'placeholder' => 'Default: 1052677'
            ]
        );
    }

    public static function GetSettings()
    {
        //merging actual settings with default ones
        return array_merge([
            'general_environment' => Environment::TEST,
            'general_client_id' => 1052677
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