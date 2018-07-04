<?php get_header(); ?>




<div class="default-page">
	
<div class="row">
	<div class="col-sm-8">
		<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>

<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</section>
	</div>
	<!-- /.col-sm-8 -->
	<div class="col-sm-4">
		<?php get_sidebar(); ?>
	</div>
	<!-- /.col-sm-4 -->
</div>
<!-- /.row -->



</div>
<!-- /.default-page -->
<?php get_footer(); ?>