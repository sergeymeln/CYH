<?php


namespace CYH\Marketing\WpOptionsHandlers\Menu;


use CYH\WpOptionsHandlers\Core\AdminMenuEnabler;
use CYH\WpOptionsHandlers\Core\OptionsHandler;

class InternetCitySettings extends AdminMenuEnabler
{
    private static $subMenuList = [];

    /**
     * InternetCitySettings constructor.
     * @param array $optionPages Has to contain non-empty array of OptionHandler objects
     */
    public function __construct(array $optionPages)
    {
        self::$subMenuList = $optionPages;
    }

    public function AddAdminMenu()
    {
        add_menu_page('Internet+City Settings',
            'Internet+City Settings',
            'manage_options',
            self::$subMenuList[0]->GetMenuSlug(),
            [self::$subMenuList[0], 'RenderSettingsPage']);
        foreach (self::$subMenuList as $subMenu)
        {
            /* @var $subMenu OptionsHandler */
            $subMenu->AddMenuItem(self::$subMenuList[0]->GetMenuSlug());
        }
    }
    public function InitializePageSettings()
    {
        foreach (self::$subMenuList as $subMenu)
        {
            /* @var $subMenu OptionsHandler */
            $subMenu->InitializeSettings();
        }
    }
}