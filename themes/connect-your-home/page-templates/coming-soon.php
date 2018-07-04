<?php
/**
 * Template Name: Coming Soon
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

get_header();
?>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <section id="content" role="main">
                    <article id="post-0" class="post not-found">
                        <header class="header">
                            <h1 class="entry-title">Coming Soon</h1>
                        </header>
                        <section class="entry-content">
                            <p class="text-center">In the meantime you could take a look at the best deals from the top providers </p>
                        </section>
                    </article>
                    <?php
                    do_action('\\' . CYH\Controllers\ConnectYourHome\MaintenancePagesController::class . '::Render404', 'common')
                    ?>
                </section>
            </div>
            <!-- /.col-sm-10 col-sm-offset-1 -->
        </div>
        <!-- /.row -->
    </div>

<?php
get_footer();