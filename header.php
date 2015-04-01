<?php
/**
 * The header for the countypages theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package countypages
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'countypages' ); ?></a>

    <?php
    // Loads a clone of the finds.org.uk navbar
    get_template_part('findsorguk', 'navbar');
    ?>

    <!-- finds.org.uk HTML -->
    <div class="container-fluid"><!-- tag closed in findsorguk-footer -->
        <div class="row-fluid"><!-- tag closed in findsorguk-footer -->
            <div class="span2"><!-- tag closed below -->

    <!-- WordPress HTML -->
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
            <a href="http://finds.dev" title="Go to the homepage"><img src="http://finds.dev/assets/logos/pas.jpg"
                                                                       alt="The Scheme's logo"
                                                                       width="213" height="104"/></a>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'countypages' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

            <!-- finds.org.uk HTML -->
            </div><!--/.span2-->
            <div class="span9"><!-- tag closed in footer -->
                <div class="row-fluid"><!-- tag closed in footer -->

                    <!-- WordPress HTML -->
                    <div id="content" class="site-content">
