<?php get_header(); ?>
<style type="text/css">    
    .wp-post-image{ display: none !important; }
</style>

<section id="content" role="main">

   <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- Blog Post -->

                <!-- Title -->

                    <header>
                        <h<?php echo (is_singular()) ? '1' : '2' ;?> class="entry-title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h<?php echo (is_singular()) ? '1' : '2' ; ?>>

                        <?php edit_post_link(); ?>
                        <div class="clearfix"></div>
                    </header>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo get_the_author(); ?> </a>
                </p>
                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php the_date(); ?></p>
                <hr>

                <!-- Preview Image -->
                <?php if(!empty(the_post_thumbnail())) { ?>
                    <img class="img-responsive" alt="" src="<?php echo the_post_thumbnail_url(); ?>">
                    <hr>
                <?php };?>
                
                <!-- Post Content -->
                <?php $content = get_the_content(); ?> 

                <div class="post-content">
                    <?php echo $content; ?> 
                </div>
                <hr>
                <!-- Blog Comments -->

<!--            <?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?> -->
                <!-- Comments Form -->
<!--                 <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr> -->

                <!-- Posted Comments -->

                <!-- Comment -->
        <!--         <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>


                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="cat-links">
                                        <?php echo get_the_category_list(); ?>
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li>
                                    <span class="tag-links">
                                        <?php the_tags(); ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>About <?php echo get_bloginfo() ?></h4>
                    <p><?php the_field('about_site', 'option') ?></p>
                </div>

            </div>

        </div>
        <!-- /.row -->
        <hr>

    </div>

<?php get_footer(); ?>