<?php

$dir = dirname(__FILE__);
// register custom nav
require_once $dir . '/../../../library/Campaign.php';

add_action('after_setup_theme', 'cyh_setup');

//remove_filter('template_redirect','redirect_canonical');

function cyh_setup()
{
    load_theme_textdomain('cyh', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    global $content_width;
    if (!isset($content_width)) $content_width = 640;
    register_nav_menus(
        array('header-menu' => __('Header Menu', 'cyh'),
            'sitemap-menu' => __('Sitemap Menu', 'cyh')));


}


add_filter('json_api_encode', 'json_api_encode_acf');

function json_api_encode_acf($response)
{
    if (isset($response['posts'])) {
        foreach ($response['posts'] as $post) {
            json_api_add_acf($post); // Add specs to each post
        }
    } else if (isset($response['post'])) {
        json_api_add_acf($response['post']); // Add a specs property
    }

    return $response;
}

function json_api_add_acf(&$post)
{
    $post->acf = get_fields($post->id);
}


add_action('wp_enqueue_scripts', 'cyh_load_scripts');
function cyh_load_scripts()
{
    wp_enqueue_script('jquery');
}

add_action('comment_form_before', 'cyh_enqueue_comment_reply_script');
function cyh_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_filter('the_title', 'cyh_title');
function cyh_title($title)
{
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}

add_filter('wp_title', 'cyh_filter_wp_title');
function cyh_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}

add_action('widgets_init', 'cyh_widgets_init');
function cyh_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Widget Area', 'cyh'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

function cyh_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php
}


add_filter('get_comments_number', 'cyh_comments_number');
function cyh_comments_number($count)
{
    if (!is_admin()) {
        global $id;
        $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

function qt_custom_breadcrumbs()
{

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

    } else {

        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;

        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1) echo ' ' . $delimiter . ' ';
            }
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;

        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }

        echo '</div>';

    }
} // end qt_custom_breadcrumbs()


// Add Shortcode for Phone Number Block
function phone_block()
{

    // Code
    return '<div class="call-cta">
    <div class="row">
        <div class="col-md-12">
            <h3>Call us for a quote!</h3>
            <a href="tel:8001234567" class="phone">800-123-4567</a>
            <p>Services Installed in as little as 24 hours.</p>
        </div>
        <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
</div>';
}

add_shortcode('phoneblock', 'phone_block');
// END Shortcode for Phone Number Block

function get_brands($field)
{
    $field['choices'] = array();

    foreach (Campaign::getProviders() as $provider) {
        $field['choices'][$provider['calp_provider_id_pk']] = $provider['calp_provider_description'];
    }

    return $field;
}

function get_promotion_types($field)
{
    $field['choices'] = array('' => 'Please select');

    foreach (Campaign::getPromotionTypes() as $provider) {

        if ($provider['PromotionTypeID'] == 1) {

//      continue;
        }

        $field['choices'][$provider['product_type_id']] = $provider['type'];
    }

    return $field;
}

function get_promotion_groups($field)
{
    $field['choices'] = array('' => 'Please select');

    foreach (Campaign::getPromotionGroups() as $provider) {

        if ($provider['PromotionTypeID'] == 1) {

//      continue;
        }

        $field['choices'][$provider['PromotionTypeID']] = $provider['Description'];
    }

    return $field;
}

add_filter('acf/load_field/name=brand', 'get_brands');
add_filter('acf/load_field/name=promotion_type', 'get_promotion_types');
add_filter('acf/load_field/name=promotion_group', 'get_promotion_groups');

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function CssVersioner()
{
    $cssfile = get_stylesheet_directory() . "/style.css";
    $turi = get_template_directory_uri();
    if (file_exists($cssfile)) {
        $cssuri = "$turi/style.css?v=" . filemtime($cssfile);
    }
    echo $cssuri;
}

add_filter('stylesheet_uri', 'CssVersioner');

function RegisterScripts()
{
    wp_register_script( 'cyh-app-main',
        get_template_directory_uri() . '/javascripts/dist/main.min.js',
        [
            'cyh-common-methods',
            'jquery-ui-custom',
            'bootstrap',
            'fastclick',
            'jvfloat',
            'js-cookie'
        ],
        filemtime(get_template_directory() . '/javascripts/dist/main.min.js'),
        true);
    wp_register_script( 'jquery-ui-custom',
        get_template_directory_uri() . '/javascripts/jquery-ui.1.10.3.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/jquery-ui.1.10.3.min.js'),
        true);
    wp_register_script( 'bootstrap',
        get_template_directory_uri() . '/javascripts/bootstrap.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/bootstrap.min.js'),
        true);
    wp_register_script( 'fastclick',
        get_template_directory_uri() . '/javascripts/dist/fastclick.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/dist/fastclick.min.js'),
        true);
    wp_register_script( 'jvfloat',
        get_template_directory_uri() . '/javascripts/jvfloat.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/jvfloat.min.js'),
        true);
    wp_register_script( 'js-cookie',
        get_template_directory_uri() . '/javascripts/lib/js.cookie-2.1.4.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/lib/js.cookie-2.1.4.min.js'),
        true);
    wp_register_script( 'enliven-em',
        get_template_directory_uri() . '/javascripts/enlivenem.min.js',
        ['snap-svg'],
        filemtime(get_template_directory() . '/javascripts/enlivenem.min.js'),
        true);
    wp_register_script( 'snap-svg',
        get_template_directory_uri() . '/javascripts/snap.svg-min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/snap.svg-min.js'),
        true);

    // Common
    wp_register_script( 'cyh-common-methods',
        get_template_directory_uri() . '/javascripts/lib/common/helper-methods.js',
        ['js-cookie'],
        filemtime(get_template_directory() . '/javascripts/lib/common/helper-methods.js'),
        true);
    // end Common

    // Group Portal
    wp_register_script( 'jquery-mask',
        get_template_directory_uri() . '/javascripts/lib/jquery.mask.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/lib/jquery.mask.min.js'),
        true);
    wp_register_script( 'jquery-validator',
        get_template_directory_uri() . '/javascripts/lib/validator.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/lib/validator.min.js'),
        true);
    wp_register_script( 'gp-loadingoverlay',
        get_template_directory_uri() . '/javascripts/lib/loadingoverlay.min.js',
        [],
        filemtime(get_template_directory() . '/javascripts/lib/loadingoverlay.min.js'),
        true);
    wp_register_script( 'gp-helper-classes',
        get_template_directory_uri() . '/javascripts/lib/group-portal/helper-classes.js',
        [],
        filemtime(get_template_directory() . '/javascripts/lib/group-portal/helper-classes.js'),
        true);
    wp_register_script( 'gp-helper-methods',
        get_template_directory_uri() . '/javascripts/lib/group-portal/helper-methods.js',
        ['jquery-validator'],
        filemtime(get_template_directory() . '/javascripts/lib/group-portal/helper-methods.js'),
        true);
    // end Group Portal

    //Table Saw
    wp_register_script( 'table-saw-jquery',
        get_template_directory_uri() . '/javascripts/lib/table-saw/tablesaw.jquery.js',
        ['jquery'],
        filemtime(get_template_directory() . '/javascripts/lib/table-saw/tablesaw.jquery.js'),
        true);
    wp_register_script( 'table-saw-init',
        get_template_directory_uri() . '/javascripts/lib/table-saw/tablesaw-init.js',
        ['table-saw-jquery'],
        filemtime(get_template_directory() . '/javascripts/lib/table-saw/tablesaw-init.js'),
        true);
    //end Table Saw

    // Marketing statistics  page styles and scripts.
    global $wp_query;

    if (is_page() && isset( $wp_query->virtual_page ) && $wp_query->virtual_page instanceof \GM\VirtualPages\PageInterface) {
        wp_enqueue_script( 'cyh-marketing',
            get_template_directory_uri() . '/javascripts/dist/marketing.min.js',
            ['jquery'],
            filemtime(get_template_directory() . '/javascripts/dist/marketing.min.js'),
            true );
        wp_enqueue_script( 'slick.min',
            get_template_directory_uri() . '/javascripts/slick.min.js',
            ['jquery'],
            filemtime(get_template_directory() . '/javascripts/slick.min.js'),
            true );
        wp_localize_script( 'cyh-marketing', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php')));
    }
    //end Marketing statistics  page styles and scripts.
}

function RegisterStyles()
{
    global $wp_query;

    if (is_page() && isset( $wp_query->virtual_page ) && $wp_query->virtual_page instanceof \GM\VirtualPages\PageInterface) {
        wp_enqueue_style( 'slick', get_template_directory_uri() .'/css/slick.css' );
        wp_enqueue_style( 'slick-theme', get_template_directory_uri() .'/css/slick-theme.css' );
        wp_enqueue_style( 'style-name', get_template_directory_uri() .'/css/marketing.min.css' );
    }
}

add_action('wp_enqueue_scripts', 'RegisterScripts');
add_action('wp_enqueue_scripts', 'RegisterStyles');
