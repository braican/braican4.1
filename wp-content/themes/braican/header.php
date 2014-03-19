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

<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">

<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,700,900|Open+Sans:300,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>

<meta property="og:image" content="http://braican.com/logo.jpg" />
<meta property="og:url" content="http://braican.com" />
<meta property="og:title" content="braican.com" />
<meta property="og:description" content="Portfolio site of Nick Braica" />

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-20596099-3', 'braican.com');
    ga('send', 'pageview', {
        'page': location.pathname + location.search  + location.hash
    });

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
