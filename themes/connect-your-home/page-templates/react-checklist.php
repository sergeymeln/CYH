<?php
/**
 * Template Name: React Checklist
 *
 * @package WordPress
 * @subpackage cyh
  * 
 */
?>

<?php  get_header('react-checklist'); ?>
<script type="text/javascript">
var initialState
<?php

        $array = get_field('tasks');
        $encodedArray = json_encode(json_api_encode_acf($array));
        echo "initialState = { tasks: ". $encodedArray ."};";
?>
</script>
	<style type="text/css">
		/*this is just to organize the demo checkboxes*/
		label {margin-right:40px;}
	</style>
<section class="checklistHeader">
    <div class="row">
        <div class="col-md-12 text-center headline">
            <h1 class="display-3">Interactive Moving Checklist</h1>
            <em class="display-3">by connectyourhome.com</em>
        </div>    
    </div>
</section>
<section class="hero">
    <div class="bottom-border" >

        <div class="col-md-6 brand-intro">
            <div class="masthead">
                <div class="banner-msg">
                    <h2><?php the_field('checklist_heading');?></h2>                    
                    <p>
                        <?php the_field('checklist_copy');?>
                    </p>

                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('checklist_feature_list') ):
                        // loop through the rows of data
                        while ( have_rows('checklist_feature_list') ) : the_row();
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
                    <div class="row service-cta">
                       <div class="col-md-12 ">                         
                       </div>
                    </div>
                </div> 
            </div>            
        </div> 
        <div class="col-md-6 brand-intro hero-holder">
        <div class="masthead">
         <?php $hero_image = get_field('checklist_hero'); ?>
                   
                    <img src="<?php echo $hero_image['url']; ?>"  alt="" />
            </div>
            <!-- /.masthead -->
        </div>
        <!-- /.col-md-12 -->
       
    </div>
    <!-- /.row -->
</section>
    <section>
		<div id="app"></div>
        <button class="btn btn-md btn-primary print-table" onclick="printFunction()">Print this Checklist!</button>
        <hr/>
    </section>
<script>
function printFunction() {
    
    window.print();
}
</script>
<script src="<?php echo get_template_directory_uri(); ?>/moving-checklist/dist/bundle.js" type="text/javascript"></script>    
<div class="col-md-12">
    <?php get_footer('react-checklist'); ?>
</div>
