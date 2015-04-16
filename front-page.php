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

        <?php
        /*
         * Retrieve and display the latest blog posts for the site.
         *
         * Settings for main site vs network sites:
         * -----------------------------------------
         * Number of posts to display: main site - 1 post; network sites - 3 posts
         * Subtitle for main site and network sites
         * More link for main site and network sites
         */
        //
        if( is_main_site() ){
            $args =  array(
                'posts_per_page' => '1',
            );
            $subtitle = 'News from PASt Explorers';
            $more_posts = 'More News';
        } else {
            $args =  array(
                'posts_per_page' => '2',
            );
            $subtitle = 'Latest Posts from ' . get_bloginfo('name');
            $more_posts = 'More Posts';
        }

        // Query to retrieve latest blog post(s)
        $latest_posts = new WP_Query( $args );
        ?>

        <?php // The Loop ?>
        <?php if ( $latest_posts->have_posts() ) : ?>

            <div class='nlposts-container nlposts-block-container'>

            <h2 class='lead'>
                <?php echo $subtitle ?>
            </h2>

                <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>

                    <ul class='nlposts-wrapper nlposts-block'>
                        <div class='nlposts-caption'>

                            <h3 class="nlposts-block-title">

                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                            </h3>

                            <div class='nlposts-block-excerpt'>

                                <?php the_excerpt(); ?>

                            </div>
                        </div>
                    </ul>

                <?php endwhile; ?>

            </div>

            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"<?php echo '<p>' . $more_posts . '</p>' ?></a>

        <?php else : ?>

            <p>No posts yet!</p>

        <?php endif; ?>

        <?php
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>

		</main><!-- #main -->

        <?php get_sidebar( 'bottom' ); ?>
	</div><!-- #primary -->

<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>
