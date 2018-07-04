<?php
/**
 * Template Name: Blank Template
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

?>
<?php

get_header();
?>
<div class="row">
    <div class="col-md-12">
        <div class="breadcrumbs">
            <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
        </div>
    </div>
</div>

<?php
the_content();
$script = get_field('ringpool_script');
if (!empty($script))
{
    echo $script;
}
else{
    echo "<div class='hide'>No Script Data</div>";
}
wp_enqueue_script('table-saw-init');
get_footer();
?>

