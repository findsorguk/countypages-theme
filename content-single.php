<?php
/**
 * @package countypages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
		get_template_part('content', 'meta');
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'countypages' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php countypages_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
