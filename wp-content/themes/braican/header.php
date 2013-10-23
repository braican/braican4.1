<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package braican
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Montserrat:700|Karla|Arvo' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<nav id="site-navigation" class="navigation-main" role="navigation">
		<h1 class="menu-toggle"><?php _e( 'Menu', 'braican' ); ?></h1>
		<div class="screen-reader-text skip-link">
			<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'braican' ); ?>"><?php _e( 'Skip to content', 'braican' ); ?></a>
		</div>
		
		<div class="secondary-braican">
			<h1>braican</h1><a id="up-arrow" href="#home">&#8593;</a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'clearfix' ) ); ?>
	</nav><!-- #site-navigation -->	
	
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<h2 class="site-description visuallyhidden"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>	
	</header><!-- #masthead -->

	<div id="main" class="site-main">
