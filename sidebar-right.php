<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package countypages
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
?>

<div id="widget-area-right" class="widget-area span3" role="complementary">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</div><!-- #widget-area-right -->
