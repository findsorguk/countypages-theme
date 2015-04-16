<?php
/**
 * The bottom sidebar containing an additional widget area below the main content on the front page.
 *
 * @package countypages
 */

if ( ! is_active_sidebar( 'sidebar-bottom' ) ) {
	return;
}
?>

<div id="widget-area-bottom" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-bottom' ); ?>
</div><!-- #widget-area-bottom -->
