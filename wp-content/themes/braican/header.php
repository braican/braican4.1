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
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,700,900|Open+Sans:300,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-20596099-3', 'braican.com');
    ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>

<div id="loading"></div>

<div id="page" class="hfeed site">
    <?php do_action( 'before' ); ?>


    
    <div id="masthead" class="site-header" role="banner">
        <hgroup class="visuallyhidden">
            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        </hgroup>

        <div class="braica-container br-cf">
            <div class="logo braica-block">
                <a href="/#"><span>nb</span></a>
            </div>

            <nav class="site-nav braica-block">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav>
            <nav class="mobile-nav"><i class="icon-menu"></i></nav>
        </div>
    </div><!-- #masthead -->

    <div id="main" class="site-main">
