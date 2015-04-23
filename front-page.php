<?php
/**
 * The front page template file.
 *
 * Used when static home page is specified.
 *
 * @package countypages
 */

get_header(); ?>

	<div id="primary" class="content-area span9">
		<main id="main" class="site-main" role="main">

            <?php if ( have_posts() ) : ?>

                <?php the_title( '<h1 class="entry-title lead">', '</h1>' ); ?>
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                    ?>

                <?php endwhile; ?>

                <?php the_posts_navigation(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>

            <?php get_template_part( 'content', 'latest' ); ?>

		</main><!-- #main -->

        <?php get_sidebar( 'bottom' ); ?>

	</div><!-- #primary -->

<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>
