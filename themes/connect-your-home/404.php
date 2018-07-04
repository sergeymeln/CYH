<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage cyh
 *
 */

?>
<?php get_header(); ?>
<div class="page-404">
    <div class="row">
        <div class="col-sm-12">
            <section id="content" role="main">
                <article id="post-0" class="post not-found">
                    <header class="header">
                        <h1 class="entry-title">This page is no longer available,<br/> but our savings are!</h1>
                    </header>
                    <section class="entry-content">
                        <p> It looks like the page you're looking for no longer exists. But you're still able to access
                            the great savings below by calling us today.</p>
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
<!-- /.404 -->
<?php get_footer(); ?>
