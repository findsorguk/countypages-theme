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
<!-- Google Consent mode -->
<script data-cookieconsent="ignore">
	window.dataLayer = window.dataLayer || [];
	function gtag() {
		dataLayer.push(arguments);
	}
	gtag("consent", "default", {
		ad_storage: "denied",
		analytics_storage: "denied",
		functionality_storage: "denied",
		personalization_storage: "denied",
		security_storage: "granted",
		wait_for_update: 2000,
	});
	gtag("set", "ads_data_redaction", true);
</script>
<!-- End Google Consent mode -->

<script data-cookieconsent="ignore">
	(function (w, d, s, l, i) {
	w[l] = w[l] || [];
	w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
	var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
	j.async = true;
	j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
	f.parentNode.insertBefore(j, f);
	})(window, document, 'script', 'dataLayer', 'GTM-WZBKMJP');
</script>
<!-- End Google Tag Manager -->

<!-- Cookiebot -->
<script
	id="Cookiebot"
	src="https://consent.cookiebot.com/uc.js"
	data-cbid="ec5f4b04-e699-4bea-a9de-eda95d4d9fb7"
	data-blockingmode="auto"
	type="text/javascript"
></script>
<!-- End Cookiebot -->

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
            <a href="<?= get_base_url(); ?>" title="Go to the homepage"><img src="<?= get_base_url(); ?>/assets/logos/pas.jpg"
                                                                       alt="The Scheme's logo"
                                                                       width="213" height="104"/></a>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            You are here:
            <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
        </div>

            <!-- WordPress HTML -->
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary',
                                            'menu_id' => 'primary-menu',
                                            'container_class' => 'sidebar-nav col-md-3', // finds.org.uk CSS
                                            'menu_class' => 'menu nav nav-stacked nav-pills collapsible',  // finds.org.uk CSS
                                            'walker' => new CountyPages_Icons_Menu_Walker() // adds icons to menu items
                                        ) ); ?>
            </nav><!-- #site-navigation -->

<?php
        if( is_main_site() && is_front_page() ) { // Only display sponsor HLF logo on front page of main site
            echo

            '<div class="site-sponsorship">
                <a href="https://www.heritagefund.org.uk" title="The Heritage Lottery Fund website"><img class="sponsors-hlf"
                                       src="' . get_base_url() . '/assets/logos/HLF_english_compact_pantone_150px.jpg"
                                                                           alt="The Heritage Lottery Fund logo"/></a>
            </div><!-- .site-sponsorship -->';
        }
?>


	</header><!-- #masthead -->

            <!-- finds.org.uk HTML -->
            </div><!--/.span2-->
            <div class="span9"><!-- tag closed in footer -->
                <div class="row-fluid"><!-- tag closed in footer -->

                    <!-- WordPress HTML -->
                    <div id="content" class="site-content row-fluid">
