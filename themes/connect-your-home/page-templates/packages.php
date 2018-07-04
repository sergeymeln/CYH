<?php
/**
 * Template Name: Packages
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
                    <?php $hero_image = get_field('hero_img');?>
                    <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
                </div>
            </div>
        </div>
    </section>
<div class="col-md-10 col-md-offset-1">
    <h2 class="page-title page-header">
    	<?php the_field('page_title');?>
    </h2>

    <?php 

    	if( have_rows('sections')):

    		while (have_rows('sections')) : the_row();
    		?>
    			<section>

	    			<?php// if(the_sub_field('section_title')) {?>
	    				<h2 >
		    				<small class="section-title">
		    					<?php the_sub_field('section_title'); ?>
		    				</small>
						</h2>
					<?php // }?>
	    			<?php if(the_sub_field('wysiwig_text')) {?>
	    				<div class="wysiwig-text-field">
	    					<?php the_sub_field('wysiwig_text'); ?>
	    				</div>
	    			<?php }
	    			if(have_rows('packages')):
	    				while(have_rows('packages')) : the_row();
	    					
	    					$price_full = get_sub_field('package_price');
	    					$pos = strpos($price_full, ".");
	    					if($pos){
	    						list($price_full, $cents) = explode(".", $price_full);
	    					}	    							
	    					?>

	    				<div class="package-holder">
		    				<h3 class="package-title-holder"> 
			    				<?php echo the_sub_field('package_title'); ?>
							</h3>	
		    				<div class="col-sm-6">
	                            <p>
	                            	<strong class="black12">
	                            		<?php the_sub_field('package_sub_subtitle'); ?>
	                            	</strong>
	                            </p>
	                            <p>
	                                <em style="font-style: italic;">
	                                	<?php echo the_sub_field('price_verbiage'); ?> 
	                                	<span class="red142">
	                                		$<?php echo $price_full; ?>.<?php echo $cents ? $cents : "99" ?>/mo
	                                	</span>
	                                </em>
	                            </p>
	                            <p>
									<?php echo the_sub_field('package_description'); ?>
	                            </p>	    					
							</div>
							<div class="col-sm-6">
	                            <div class="price-box">
	                                <p>
	                                	<strong class="price">
	                                		$<?php echo $price_full; ?>
	                                		<span class="tens"><?php echo $cents ? $cents : "99" ?></span>
	                                		<span class="month">mo</span>
	                                	</strong>
	                                </p>
	                                <div class="text-price">
	                                	<strong>
	                                		For 1 Year!
	                                	</strong>
	                                	<br/>
	                                		<span style="font-style: italic;">
	                                		reg $<?php echo the_sub_field('package_regular_price');?>/mo
	                                		</span>
	                                </div>
	                            </div>
							</div>			
			    			<div class="clearfix"></div>
							<div class="btn-group" role="group" aria-label="...">
							  <a href="<?php echo the_sub_field('package_link'); ?>" class="btn btn btn-danger btn-custom" role="button" title="Order DISH Network">Order Now: <?php
                        echo get_field('cyb_phone_number', 'option'); ?></a>
							  <a href="<?php echo the_sub_field('channel_link')?>" class="btn btn-default " title="View Local Channels" onClick="ga('send', 'event', 'Call', 'ClicktoCall - Packages');" >View Channels</a>
							</div>					
	    					<div class="clearfix"></div>
						</div>
						<?php    					
	    				endwhile;
	    			else:
    				endif;?>
	    			<div class="clearfix"></div>
    			</section>
			<?php
    		endwhile;
    	else :
    	endif;
    ?>
</div>

<?php include 'modal-form.php' ?>
<div class="col-md-12">
    <?php get_footer(); ?>
</div>
