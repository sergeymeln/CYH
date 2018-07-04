<?php


namespace CYH\WpWalkers;


class BootstrapMenuWalker extends \WP_Bootstrap_Navwalker
{
    private $menuItemsCounter = 0;

    /**
     * Start Level.
     *
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @access public
     * @param mixed $output Passed by reference. Used to append additional content.
     * @param int $depth (default: 0) Depth of page. Used for padding.
     * @param array $args (default: array()) Arguments.
     * @return void
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $this->menuItemsCounter++;
        $indent = str_repeat("\t", $depth);
        //we apply additional classes only if we have a lot of menu items as they fill all the width
        $class = ($this->menuItemsCounter > 5) ? 'dropdown-menu-right' : '';

        $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu " . $class . "\" >\n";
    }
}