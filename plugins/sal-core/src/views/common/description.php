<?php
/* @var $items array  */

foreach ($items as $item)
{
    /* @var $item \CYH\Helpers\Parsers\SectionBase */
    /* @var $domain string The value passed from controller */
    /* @var $subtemplate string The value passed from controller */

    do_action('\CYH\Controllers\Common\CommonUIComponents::RenderDescriptionVariant', $item, $domain, $subtemplate);
}
