<?php
/**
 * @package countypages
 */
?>

<article id="post-<?php the_ID( ); ?>" <?php post_class( ); ?>>
	<header class="entry-header">
        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php
		get_template_part( 'content', 'meta' );
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_excerpt( ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php countypages_entry_footer( ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
