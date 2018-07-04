<?php


namespace CYH\WpOptionsHandlers\Core;


abstract class OptionsHandler
{
    protected $wpOptions;
    protected $internalSettings = [];

    const PAGE_TITLE_SETTING = 'pageTitle';
    const MENU_TITLE_SETTING = 'menuTitle';

    public function AddMenuItem($parentMenuSlug)
    {
        add_submenu_page($parentMenuSlug,//'cyh-sal-core',
            $this->GetPageTitle(),
            $this->GetMenuTitle(),
            'manage_options',
            $this->GetMenuSlug(),
            array($this, 'RenderSettingsPage'));
    }

    public function RenderCheckboxSetting($args)
    {
        printf(
            '<input type="checkbox" id="%s" name="%s[%s]" %s />',
            $args['name'],
            $args['option-name'],
            $args['name'],
            isset($this->wpOptions[$args['name']]) && $this->wpOptions[$args['name']] == true ? 'checked' : ''
        );
        $this->RenderDescriptionBlock($args['description']);
    }

    public function RenderRadioSetting($args)
    {
        $markDefault = $args['selectDefault'];
        foreach ($args['values'] as $key => $value) {
            printf(
                '<label for="%s"><input type="radio" name="%s[%s]" value="%s" %s />' . $value . '</label><br>',
                $args['name'],
                $args['option-name'],
                $args['name'],
                $key,
                (isset($this->wpOptions[$args['name']]) && $this->wpOptions[$args['name']] == $key) || $markDefault == true ? 'checked' : '' //input's check state
            );
            $markDefault = false;
        }
        $this->RenderDescriptionBlock($args['description']);
    }

    public function RenderTextInputSetting($args)
    {
        printf(
            '<input type="text" id="%s" name="%s[%s]" value="%s" size="%s" placeholder="%s"/>',
            $args['name'],
            $args['option-name'],
            $args['name'],
            isset($this->wpOptions[$args['name']]) && !empty($this->wpOptions[$args['name']]) ? $this->wpOptions[$args['name']] : '',
            (isset($args['size']) && !empty($args['size']) && $args['size'] > 0) ? $args['size'] : 70,
            $args['placeholder']
        );
        $this->RenderDescriptionBlock($args['description']);
    }

    public function RenderTextareaSetting($args)
    {
        printf(
            '<textarea id="%s" name="%s[%s]" rows="%s" cols="%s" placeholder="%s">%s</textarea>',
            $args['name'],
            $args['option-name'],
            $args['name'],
            (isset($args['rows']) && !empty($args['rows']) && $args['rows'] > 0) ? $args['rows'] : 4,//rows
            (isset($args['cols']) && !empty($args['cols']) && $args['cols'] > 0) ? $args['cols'] : 20,//cols
            $args['placeholder'],
            isset($this->wpOptions[$args['name']]) && !empty($this->wpOptions[$args['name']]) ? $this->wpOptions[$args['name']] : ''
        );
        $this->RenderDescriptionBlock($args['description']);
    }

    public static function GetOptionStorageKey()
    {
        return str_replace('\\', '_', get_called_class());
    }

    public function GetMenuSlug()
    {
        return get_class($this);
    }

    public function GetPageTitle()
    {
        return isset($this->internalSettings[self::PAGE_TITLE_SETTING]) ? $this->internalSettings[self::PAGE_TITLE_SETTING] : 'Page Title Setting is not set in ' . get_class($this) . ' class';
    }

    public function GetMenuTitle()
    {
        return isset($this->internalSettings[self::MENU_TITLE_SETTING]) ? $this->internalSettings[self::MENU_TITLE_SETTING] : 'Menu Title Setting is not set in ' . get_class($this) . ' class';
    }

    private function RenderDescriptionBlock($string)
    {
        if (isset($string) && !empty($string)) {
            printf(
                '<p class="description" id="tagline-description">%s</p>',
                $string
            );
        }
    }

    public function RenderSettingsPage()
    {
        ?>
        <div class="wrap">
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields(self::GetOptionStorageKey());
                do_settings_sections($this->GetMenuSlug());
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public static function GetSettings()
    {
        return get_option(self::GetOptionStorageKey(), []);
    }

    //has to have implementation in child class as relies on name of class
    protected abstract function LoadSettings();

    public abstract function InitializeSettings();

    public abstract function SanitizeInput($input);


}