<?php
/**
 * Template Name: Channels
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */

?>


<?php get_header(); ?>
    <section class="hero">
        <div class="row">
        <div class="col-md-8 brand-intro hero-holder">
                <div class="masthead">
                    <?php $hero_image = get_field('hero'); ?>
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                </div>
            </div>
            <!-- /.col-md-12 -->
		<div class="col-md-4 brand-intro">
            <div class="masthead">
                <div class="banner-msg">
                    <h2>
                    	<?php the_field('brand_heading');?>
                    </h2>
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('one_brand_feature_list') ):
                        // loop through the rows of data
                        while ( have_rows('one_brand_feature_list') ) : the_row();
                    ?>
                    <ul>
                        <li>
                    <?php
                            // display a sub field value
                            the_sub_field('feature'); ?>
                        </li>
                    </ul>
                    <?php
                        endwhile;

                    else :
                        // no rows found
                    endif;

                    ?>                    
                    <p>
                        <?php the_field('brand_copy');?>
                    </p>
                </div> 
            </div>            
        </div> 
        </div>
    </section>
	   	
<section class="channels">
<h1><?php echo get_the_title(); ?></h1>
<p><?php echo the_content(); ?></p>
<div class="table-responsive">
<table class="table table-striped">
    <thead>
      <tr>
<?php
if( have_rows('channel_table_head') ):
 	// loop through the rows of data
    while ( have_rows('channel_table_head') ) : the_row();
	?>
      
		<th>
            <?php echo the_sub_field('table_head_name'); ?>
        </th>
      
    <?php
    endwhile;

else :
endif;
?>      
</tr>
    </thead>
    <tbody>
<?php

// check if the repeater field has rows of data
if( have_rows('channel') ):
 	// loop through the rows of data
    while ( have_rows('channel') ) : the_row();
	?>
      <tr>
        <td>
            <img src="<?php echo the_sub_field('logo')?>">
        </td>
        <td>
            <?php echo the_sub_field('name')?>
        </td>
  	<?php
		if( have_rows('column_count') ): ?>
		<?php 
		while( have_rows('column_count') ): the_row();
			?>
			<td>
				<?php if (get_sub_field('package_contained') == 1){
						echo '√';
					} ?>
			</td>
		<?php endwhile;
      
	endif;    ?>     
</tr>
 <?php   endwhile;

else :
endif;

?>    
    </tbody>
  </table> 
  </div>	
    </section>



<div class="clearfix"></div>
<div class="col-md-12">
    <?php get_footer('home'); ?>
</div>
