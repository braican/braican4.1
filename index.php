<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/master.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nicholas V. Braica</title>
<script type="text/javascript" src="js/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="css/highslide.css" />
<link rel="stylesheet" type="text/css" href="css/orbit.css">
<link rel="stylesheet" type="text/css" href="http://braican.com/blog/wp-content/plugins/sexybookmarks/css/style.css" />
<script type="text/javascript">
	hs.graphicsDir = 'assets/highslide/';
	hs.wrapperClassName = 'wide-border';
</script>
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery.orbit.min.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('#featured').orbit({
			'bullets': true,
			'timer' : true,
			'animation' : 'horizontal-slide',
			'startClockOnMouseOut': true,
			'startClockOnMouseOutAfter': 3000,
			'captions': true,
		});
	});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20596099-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<!-- #BeginLibraryItem "/Library/social_side.lbi" -->
<ul class="side_content">
  <li id="facebook"><a href="http://www.facebook.com/profile.php?id=620290491" title="Connect on Facebook" target="_blank"></a></li>
  <li id="linkedin"> <a href="http://www.linkedin.com/in/nicholasbraica" title="Connect on LinkedIn" target="_blank"></a> </li>
  <li id="youtube"><a href="http://www.youtube.com/user/nvbraica8" title="View my videos on YouTube" target="_blank"></a></li>
  <li id="flickr"><a href="http://www.flickr.com/photos/braican/" title="View my photos on Flickr" target="_blank"></a> </li>
  <li id="email"> <a href="mailto:nvbraica8@gmail.com" title="Email Me"></a></li>
  <li><img src="assets/get_in_touch.png" /></li>
</ul>
<!-- #EndLibraryItem -->
<div id="content">
  <div id="header">
    <div id="navbar"> <a href="index.php"> <img src="assets/logos/braican3_small.png" width="271" height="95" border="0" /></a>
      <ul id="top_menu">
        <li><a href="portfolio.html">CREATIVE WORK</a></li>
        |
        <li><a href="blog/">BLOG</a></li>
        |
        <li><a href="contact.html">CONTACT</a></li>
        |
        <li><a href="about.html">ABOUT</a></li>
        |
        <li><a href="resume.html">RESUME</a></li>
      </ul>
    </div>
  </div>
  
  <div class="main-content">
    
    <div id="featured">
    	<a href="http://www.braican.com/website_design.html"><img src="assets/slider_img1.jpg" title="braican Web Design" rel="braicanCaption" /></a>
        <a href="http://www.braican.com/graphic_design.html"><img src="assets/slider_img2.jpg" rel="process-books" /></a>
        <a href="http://www.braican.com/flash.html"><img src="assets/slider_img3.jpg" rel="tgfln"  /></a>
    </div>
    
    <span class="orbit-caption" id="braicanCaption">The new braican.com</span>
    <span class="orbit-caption" id="process-books"><span style="font-size:20px; font-weight:bold;">Process books</span>... because school work is important too.</span>
    <span class="orbit-caption" id="tgfln">Check out the newest, most amazing game ever. Just read the disclaimer first.</span>
    
    <div id="main" style="margin-top:20px;">
      <h1 style="color:#ccc; border:none;">Hey, I'm Nick. And I do...something.</h1>
      <div class="main-left">
        <p>It's easy as a student to explore new areas, find new interests, and develop skills on a new level. Which is good for someone like me, who can't make up their mind. In that regard, I'm going to refrain from specifically labeling myself as a designer, a programmer, a musician, or any other specific creative industry title. I'm simply in the creative industry.</p>
        <p>My portfolio of work includes a wide range of media, from my drawing and painting, to Flash games using ActionScript 3. And I believe that everything there is relevant to my personal style and skills, even if it was done in the 8th grade.</p>
        <p>So look around. Explore. Enjoy. And if you have anything to say, let me hear it. There's plenty of ways to <a href="contact.html">get in touch</a>.</p>
      </div>
      
      <div class="main-right">
        <h1><a href="blog/">The Blog</a></h1>
        <?php 
/* Short and sweet */
define('WP_USE_THEMES', false);
require('blog/wp-blog-header.php');
?>
        <?php query_posts('showposts=1'); ?>
        <?php while (have_posts()) : the_post(); ?>
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <h2 style="color:#ccc; border:none;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a></h2>
          <small>
          <?php the_time('F jS, Y') ?>
          <!-- by <?php the_author() ?> --> 
          </small>
          <div class="entry">
            <?php the_content(); ?>
          </div>
          <p class="postmetadata">
            <?php the_tags('Tags: ', ', ', '<br />'); ?>
            Posted in
            <?php the_category(', ') ?>
            |
            <?php edit_post_link('Edit', '', ' | '); ?>
            <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
          </p>
        </div>
        <br />
        <?php endwhile;?>
      </div>
      
    </div>
  </div>
  <div style="clear:both;"></div>
  <!-- #BeginLibraryItem "/Library/copyright.lbi" -->
  <div id="copyright">
    <p>&copy; braican.com 2010. Designed by Nicholas V. Braica <br />
      Blog powered by <a href="http://wordpress.org/" target="_blank">WordPress</a></p>
  </div>
  <!-- #EndLibraryItem --></div>
</body>
</html>
