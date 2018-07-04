<?php
/**
 * Template Name: About Us
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php get_header(); ?>
    <section class="hero">
        <div class="row">
            <div class="col-md-12">
                <div class="masthead">
                    <?php $hero_image = get_field('about_us_hero');?>
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                </div>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </section>

<section class="about-write-up">
    <div>
        <h2 class="section-heading">
            <?php the_field('about_headline');?>
        </h2>
        <div class="about-subhead">
            <?php the_field('about_subhead');?>
        </div>
    </div>
</section>   

    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        <?php the_field('service_headline');?>
                    </h2>
                    <h3 class="section-subheading text-muted">
                        <?php the_field('service_subtext');?>
                    </h3>
                </div>
            </div>
            
            <div class="row text-center">
                <?php if(have_rows('about_us_services')) : 
                    while ( have_rows('about_us_services')) : the_row();
                ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-success"></i>
                            <i class="fa fa-<?php the_sub_field('bootstrap_icon') ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading">
                            <?php the_sub_field('service_heading') ?>
                        </h4>
                        <p class="text-muted">
                            <?php the_sub_field('service_description'); ?>
                        </p>
                    </div>
                <?php endwhile;
                else :
                // no rows found
                endif;?>
            </div>

        </div>
    </section>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">
                        <?php the_field('main_headline'); ?>
                    </h2>
                    <h3 class="section-subheading text-muted">
                        <?php the_field('about_us_subtext') ?>
                    </h3>
                </div>
            </div>
            <div class="row">
                <?php if(have_rows('team')) :
                    while (have_rows('team')) : the_row(); 
                        $teammate_picture = get_sub_field('teammate_picture');
                    ?>
                        <div class="col-sm-3">
                            <div class="team-member text-center">
                                <img src="<?php echo $teammate_picture['url'] ?>" class="img-responsive img-circle" alt="">
                                <h4>
                                    <?php the_sub_field('teammate_name'); ?>
                                </h4>
                                <p class="text-muted">
                                    <?php the_sub_field('teammate_position'); ?>
                                </p>
                                <ul class="list-inline social-buttons">
                                    <?php if(get_sub_field('twitter_link')){ ?>
                                        <li>
                                            <a href="<?php echo the_sub_field('twitter_link')?>">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(get_sub_field('facebook_link')){ ?>
                                        <li>
                                            <a href="<?php echo the_sub_field('facebook_link')?>">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if(get_sub_field('linkedin_link')){ ?>
                                        <li>
                                            <a href="<?php echo the_sub_field('linkedin_link')?>">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php endwhile;
                    else :
                        // no rows found
                    endif;?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <div class="large text-muted"><?php the_field('sub_avatar_text'); ?></div>
                </div>
            </div>
        </div>
    </section>



  <iframe width="100%" height="400px" src="//www.google.com/maps/embed/v1/place?q=4700%20s%20syracuse%20st,Denver%20,%20CO
      &zoom=17
      &key=AIzaSyAz7eVtOC0P8EvEswVu85MNe91ODgVEMAA">
  </iframe>
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- /.one-brand -->
<?php include 'modal-formstack.php' ?>
<div class="col-md-12">
    <?php get_footer(); ?>
</div>