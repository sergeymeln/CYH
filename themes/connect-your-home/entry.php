
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>

	<?php 
        $tag;
        if ( is_singular() ) $tag = "h1"; else $tag = "h2" ;?>

			<<?php echo $tag; ?> class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</<?php echo $tag; ?>>

			<?php edit_post_link(); ?>

		<div class="clearfix"></div>
	</header>

<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>

</article>