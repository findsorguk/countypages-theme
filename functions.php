<?php
/**
 * countypages functions and definitions
 *
 * @package countypages
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'countypages_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function countypages_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on countypages, use a find and replace
	 * to change 'countypages' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'countypages', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

    add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

    function my_post_image_html( $html, $post_id, $post_image_id ) {
        $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
        return $html;
    }

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'countypages' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'countypages_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // countypages_setup
add_action( 'after_setup_theme', 'countypages_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function countypages_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'countypages' ),
		'id'            => 'sidebar-right',
		'description'   => 'Right-hand widget area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
        'name'          => __( 'Bottom Sidebar', 'countypages' ),
        'id'            => 'sidebar-bottom',
        'description'   => 'Bottom widget area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'countypages_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function countypages_scripts() {
	wp_enqueue_style( 'countypages-style', get_stylesheet_uri() );

    // Include CSS files from finds.org.uk
    wp_enqueue_style( 'countypages-bootstrap.min', 'http://finds.dev/css/bootstrap.min.css', false, '', 'screen' );
    wp_enqueue_style( 'countypages-custom-bootstrap', 'http://finds.dev/css/custom-bootstrap.css', false, '',  'screen' );
    wp_enqueue_style( 'countypages-lightbox', 'http://finds.dev/css/lightbox.css', 'screen', false, '', 'screen' );
    wp_enqueue_style( 'countypages-jquery.reject', 'http://finds.dev/css/jquery.reject.css', false, '',  'screen' );
    wp_enqueue_style( 'countypages-bootstrap-responsive.min', 'http://finds.dev/css/bootstrap-responsive.min.css', false, '',  'screen' );
    wp_enqueue_style( 'countypages-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css', false, '', 'screen');
    wp_enqueue_style( 'countypages-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans', false, '', 'screen');
    wp_enqueue_style( 'countypages-print', 'http://finds.dev/css/print.css', false, '',  'print' );

	wp_enqueue_script( 'countypages-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'countypages-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    // Include JS files from finds.org.uk
    wp_enqueue_script( 'countypages-jquery.min', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '', true );
    wp_enqueue_script( 'countypages-jquery-ui.min', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js', array(), '', true );
    wp_enqueue_script( 'countypages-global-functions', 'http://finds.dev/js/globalFunctions.js', array(), '', true );
    wp_enqueue_script( 'countypages-jquery-lightbox', 'http://finds.dev/js/JQuery/jquery.lightbox.js', array(), '', true );
    wp_enqueue_script( 'countypages-bootstrap.min', 'http://finds.dev/js/bootstrap.min.js', array(), '', true );
    wp_enqueue_script( 'countypages-cookiesdirective', 'http://finds.dev/js/JQuery/jquery.cookiesdirective.js', array(), '', true );
    wp_enqueue_script( 'countypages-jquery-reject', 'http://finds.dev/js/jquery.reject.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'countypages_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Remove annoying ?ver= from enqueued CSS styles and JS that come from finds.org.uk
 */
function countypages_remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'countypages_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'countypages_remove_cssjs_ver', 10, 2 );

/**
 * Add .active class to active primary menu item in the style of finds.org.uk
 */
function countypages_active_nav_class ( $classes ) {
    if( in_array( 'current-menu-item', $classes ) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'countypages_active_nav_class' );

/**
 * Replace the excerpt "more" text with a link
 */
function new_excerpt_more($more) {
    global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Take control of CSS classes output in Network Latest Posts
 */
function countypages_nlposts_block_css( $html_tags ) {
    $html_tags = array(
        'wrapper_o' => "<ul class='nlposts-wrapper nlposts-block'>",
        'wrapper_c' => "</ul>",
        'wtitle_o' => "<h2 class='lead'>",
        'wtitle_c' => "</h2>",
        'item_o' => "",
        'item_c' => "",
        'content_o' => "<div class='nlposts-container nlposts-block-container'>",
        'content_c' => "</div>",
        'meta_o' => "<i class='icon-map-marker'></i><span class='nlposts-block-meta-override'>",
        'meta_c' => "</span>",
        'thumbnail_o' => "",
        'thumbnail_c' => "",
        'thumbnail_io' => "<li class='nlposts-block-thumbnail-litem-override span6'>",
        'thumbnail_ic' => "</li>",
        'pagination_o' => "<div class='nlposts-block-pagination pagination'>",
        'pagination_c' => "</div>",
        'title_o' => "<h3 class='nlposts-block-title'>",
        'title_c' => "</h3>",
        'excerpt_o' => "<div class='nlposts-block-excerpt'><p>",
        'excerpt_c' => "</p></div>",
        'caption_o' => "<div class='nlposts-caption'>",
        'caption_c' => "</div>"
    );
    return $html_tags;
}
add_filter( 'nlposts_block_output', 'countypages_nlposts_block_css' );


/**
 * Add Font Awesome icons to the primary menu in the style of finds.org.uk
 *
 * Modifies $args->link_before to inject into start_el method of parent
 *
 */

class CountyPages_Icons_Menu_Walker extends Walker_Nav_Menu {

    function generate_icon_tag ( $iconName ) {
        $iconWrap = '<i class="icon-%s"></i>';
        return sprintf( $iconWrap, $iconName );
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        if ( $args->theme_location == 'primary' ) {

            if ( $depth == 0 ) { // only add icons to top-level menu items

                switch ($item->title) {
                    case 'Home':
                        $args->link_before = $this->generate_icon_tag( 'home' );
                        break;
                    case 'Counties': //Primary site only
                        $args->link_before = $this->generate_icon_tag( 'map-marker' );
                        break;
                    case 'News': //Primary site only
                        $args->link_before = $this->generate_icon_tag( 'calendar' );
                        break;
                    case 'Guides': //Primary site only
                        $args->link_before = $this->generate_icon_tag( 'eye-open' );
                        break;
                    case 'About': //Primary site only
                        $args->link_before = $this->generate_icon_tag( 'info-sign' );
                        break;
                    case strpos($item->title, 'Historic'): //Network sites only
                    $args->link_before = $this->generate_icon_tag( 'picture' );
                    break;
                    case 'Finds': //Network sites only
                        $args->link_before = $this->generate_icon_tag( 'map-marker' );
                        break;
                    case 'Get Involved': //Network sites only
                        $args->link_before = $this->generate_icon_tag( 'thumbs-up' );
                        break;
                    case 'Team': //Network sites only
                        $args->link_before = $this->generate_icon_tag( 'star' );
                        break;
                    case 'Contact':
                        $args->link_before = $this->generate_icon_tag( 'user' );
                        break;

                    default:
                        $args->link_before = $this->generate_icon_tag( 'file' );
                }
            }

            parent::start_el($output, $item, $depth, $args);

        }
    }
}


