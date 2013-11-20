<?php
/**
 * braican functions and definitions
 *
 * @package braican
 */


$SET_THIS = 'set in functions';

@ini_set( 'upload_max_size' , '6M' );
@ini_set( 'post_max_size', '6M');
@ini_set( 'max_execution_time', '300' );


// remove the admin bar
add_filter('show_admin_bar', '__return_false');


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'braican_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function braican_setup() {

		/**
		 * Custom template tags for this theme.
		 */
		require( get_template_directory() . '/inc/template-tags.php' );

		/**
		 * Custom functions that act independently of the theme templates
		 */
		require( get_template_directory() . '/inc/extras.php' );

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on braican, use a find and replace
		 * to change 'braican' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'braican', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		//This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'braican' ),
		) );

		// Enable support for Post Formats
		//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	}
endif; // braican_setup

add_action( 'after_setup_theme', 'braican_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function braican_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'braican' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'braican_widgets_init' );


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, false, true);
   wp_enqueue_script('jquery');
}

/**
 * Enqueue scripts and styles
 */
function braican_scripts() {

	wp_enqueue_style( 'braican-style', get_stylesheet_uri() );

	wp_enqueue_script( 'scrollto-js', get_template_directory_uri() . '/js/jquery.scrollTo-1.4.3.1-min.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'waypoints-js', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '20130115', true );
	wp_enqueue_script( 'braican-js', get_template_directory_uri() . '/js/braican.js', array('jquery', 'scrollto-js'), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'braican-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'braican_scripts' );

// --------------------------
// register post types

function create_post_type() {
    register_post_type( 'project',
        array(
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project'
            ),
            'description' => 'a content type for adding new projects',
            'public' => true,
            // 'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail')
        )
    );

    register_post_type( 'funfact',
        array(
            'labels' => array(
                'name' => 'Fun Fact',
                'singular_name' => 'Fun Fact',
                'add_new_item' => 'Add New Fact (I also...)',
                'edit_item' => 'Edit Fact (I also...)'
            ),
            'description' => 'a content type for adding fun little factoids',
            'public' => true,
            'has_archive' => false,
            'supports' => array('title')
        )
    );
}
add_action( 'init', 'create_post_type' );

// ----------------------------
// register taxonomies

function create_taxonomies(){
	// project categories
	register_taxonomy('project_categories', 'project',
		array(
			'labels' => array(
					'name' => 'Project Category'
				),
			'hierarchical' => 'true'
			)
	);

	// project tags
	register_taxonomy('project_tags', 'project',
		array(
			'labels' => array(
					'name' => 'Project Tags'
				)
			)
	);
}
add_action( 'init', 'create_taxonomies' );