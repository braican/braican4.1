<?php
/**
 * braican functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package braican
 */

if ( ! function_exists( 'braican_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function braican_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on braican, use a find and replace
	 * to change 'braican' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'braican', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'braican' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'braican_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'braican_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function braican_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'braican_content_width', 640 );
}
add_action( 'after_setup_theme', 'braican_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function braican_scripts() {
	// get rid of that wp-embed thing, and jquery
	wp_deregister_script( 'wp-embed' );
	wp_deregister_script('jquery');

	// and also load up our styles and scripts
	wp_enqueue_script( 'braican_script_main', get_template_directory_uri() . '/js/build/production.js', array('jquery'), false, true );
    wp_enqueue_style( 'braican__style', get_template_directory_uri() . '/styles/build/style.css' );
}
add_action( 'wp_enqueue_scripts', 'braican_scripts' );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


//
// Custom post types
//
require get_template_directory() . '/inc/content-types.php';

//
// Custom template tags for this theme.
//
require get_template_directory() . '/inc/template-tags.php';

//
// Functions which enhance the theme by hooking into WordPress.
//
require get_template_directory() . '/inc/template-functions.php';

//
// Customizer additions.
//
require get_template_directory() . '/inc/customizer.php';

//
// API
//
require get_template_directory() . '/api/api.php';


//
// server settings
//

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
