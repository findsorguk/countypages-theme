<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ( 'post' == get_post_type() ) : ?>

            <?php the_title( sprintf( '<h1 class="entry-title lead"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

            <div class="entry-meta">
                <?php countypages_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">

        <?php the_excerpt( ); ?>

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