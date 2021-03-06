<?php


namespace CYH\WpOptionsHandlers\Menu;


use CYH\WpOptionsHandlers\Core\AdminMenuEnabler;
use CYH\WpOptionsHandlers\Core\OptionsHandler;

class SingleProviderSettings extends AdminMenuEnabler
{
    private static $subMenuList = [];

    /**
     * SalCoreSettings constructor.
     * @param array $optionPages Has to contain non-empty array of OptionHandler objects
     */
    public function __construct(array $optionPages)
    {
        self::$subMenuList = $optionPages;
    }

    public function AddAdminMenu()
    {
        add_menu_page('Single Provider Portal Settings',
            'Single Provider Portal Settings',
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