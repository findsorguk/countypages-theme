<?php
/**
 * The template used for displaying a list of latest blog posts in front-page.php
 *
 * @package countypages
 * @todo refactor to use in-house CSS
 */
?>
<?php
/*
 * Settings for main site vs network sites:
 * -----------------------------------------
 * Number of posts to display: main site - 1 post; network sites - 3 posts
 * Subtitle for main site and network sites
 * More link for main site and network sites
 */
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

            <div class='latest-container'>

            <h2 class='lead'>
                <?php echo $subtitle ?>
            </h2>

<?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>

    <ul class='latest-wrapper'>
            <div class='latest-excerpt'>

                <?php if ( has_post_thumbnail() ) : ?>  

                    <ul class="latest-thumbnails pull-right">  
                        <li>
                            <div>
                                <?php the_post_thumbnail(array(100,100), array(
                                    'class' => "img-polaroid") )
                                ?>  
                            </div>
                        </li>
                    </ul>

                   <?php endif; ?>

                <?php the_title( sprintf( '<div class="latest-title"><h3 class="latest-title">
                    <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3></div>' );
                ?>

                <div class="entry-meta">
                    <?php countypages_posted_on(); ?>
                </div><!-- .entry-meta -->

                <?php the_excerpt(); ?>

            </div>
    </ul>


<?php endwhile; ?>

            </div>

            <div class='latest-more'>
                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"<?php echo '<p>' . $more_posts . '</p>' ?></a>
            </div>


<?php else : ?>

    <p>No posts yet!</p>

<?php endif; // End of the Loop ?>

<?php
/* Restore original Post Data */
wp_reset_postdata();
?>