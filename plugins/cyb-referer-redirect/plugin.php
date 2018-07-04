<?php

/*
Plugin Name: CYB Redirects
Description: Plugin with custom redirects based on referrer for Group 1242270
Version: 1.0
Author: Mykola Piatkovskyi
*/

if (!defined('WPINC')) {
    die;
}

function strposa($haystack, $needle, $offset=0) {
    if(!is_array($needle))
    {
        $needle = array($needle);
    }
    foreach($needle as $query) {
        if(strpos($haystack, $query, $offset) !== false)
        {
            return true; // stop on first true result
        }
    }
    return false;
}

add_action('plugins_loaded', function () {
    $referrerList = [
        'aapc.corestream.com/offer',
        'aapc.corestream.com/offer',
        'abington.corestream.com/Offer.aspx',
        'chs.corestream.com/offer',
        'cmc.corestream.com/offer',
        'cvs.corestream.com/offer',
        'godaddy-responsive.corestream.com/offer',
        'harris.corestream.com/offer',
        'heartland.corestream.com/offer',
        'ipg.corestream.com/offer',
        'iuhealth.corestream.com/offer',
        'iuhealth.corestream.com/Offer.aspx',
        'iuhealthvoluntary.corestream.com/Offer.aspx',
        'jefferson.corestream.com/Offer.aspx',
        'mondelezextras.corestream.com/offer',
        'nch.corestream.com/offer',
        'quest.corestream.com/offer',
        'samsung-sas.corestream.com/offer',
        'samsung-ssi.corestream.com/offer',
        'sandia.corestream.com/offer',
        'slcity.corestream.com/Offer.aspx',
        'tbc.corestream.com/offer',
        'temple.corestream.com/offer',
        'universityofpittsburgh.corestream.com/Offer.aspx',
        'wawa.corestream.com/offer'
    ];
    if (preg_match('/^\/cyb\//', $_SERVER['REQUEST_URI']) != false && $_GET['groupId'] == '1242270' &&
        !empty($_SERVER['HTTP_REFERER']) && strposa($_SERVER['HTTP_REFERER'], $referrerList)) {
        wp_redirect('/cyb/?groupId=1242346');
        die;
    }
});
