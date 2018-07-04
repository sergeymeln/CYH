<?php
/**
 * Template Name: Narrow Column
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

?>

<?php get_header(); ?>
    <!-- This is the page specific wrapping class -->
    <div class="channel-list">
        <section class="list-header">
            <div class="breadcrumbs">
                <?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
            </div>

            <div class="row">
                <div class="row-height">
                    <div class="col-md-3 col-md-height bg-left">

                        <!-- This is here for the Background pattern -->
                    </div>
                    <div class="col-md-6 col-md-height">

                        <div class="row">
                            <div class="col-md-12">
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <?php the_content(); ?>

                                <?php endwhile; endif; ?>

                            </div>
                            <!-- /col-md-12 -->
                        </div> <!-- /row -->
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                    <div class="col-md-3 col-md-height bg-right">
                        <!-- This is here for the Background pattern -->
                    </div>
                </div> <!-- /row-height -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.results-header -->
    </div> <!-- /results-page -->

<?php get_footer(); ?>