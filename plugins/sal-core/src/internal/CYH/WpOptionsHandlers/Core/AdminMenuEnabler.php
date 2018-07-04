<?php


namespace CYH\WpOptionsHandlers\Core;


abstract class AdminMenuEnabler
{
    public function EnableMenu()
    {
        if (!has_action('admin_menu', [$this, 'AddAdminMenu']))
        {
            add_action('admin_menu', [$this, 'AddAdminMenu']);
        }
        if (!has_action('admin_init', [$this, 'InitializePageSettings']))
        {
            add_action( 'admin_init', [$this, "InitializePageSettings"]);
        }
    }

    public abstract function AddAdminMenu();
    public abstract function InitializePageSettings();

}