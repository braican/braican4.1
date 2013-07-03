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

<link href='http://fonts.googleapis.com/css?family=Fredoka+One|Carrois+Gothic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="../../css/master.css" />
<link rel="stylesheet" type="text/css" href="/blog/wp-content/themes/new/style.css" />
<link rel="stylesheet" type="text/css" href="/blog/wp-content/plugins/sexybookmarks/css/style.css" />
<script src="../../js/jquery-tools.js" type="text/javascript"></script>
<script src="../../js/braican.js" type="text/javascript"></script>

<style type="text/css" media="all">
#blog-bg {
	background: url(../../assets/background-pics/blog<?php echo rand(1,4); ?>.jpg) no-repeat top left;
	height:300px;
	margin-left:-2px;
	-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	background-size:cover;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../assets/background-pics/blog<?php echo rand(1,4); ?>.jpg', sizingMethod='scale');
	-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../assets/background-pics/blog<?php echo rand(1,4); ?>.jpg', sizingMethod='scale')";
	height: 300px;
	min-width:1000px;
}
</style>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20596099-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

<div id="blog-bg">
  <div id="header-container">
    <div id="header">
    	<a href="../index.php"><img class="logo" src="../../assets/logo/logo.png" border="0" /></a>
      	<ul id="navigation">
        	<li><a href="../about.php">More Info</a></li>
	        <li><a href="../portfolio.php">The Work</a></li>
	        <li><a href="blog/" class="active">My Thoughts</a></li>
	        <li><a href="../contact.php">Let's Talk</a></li>
      	</ul>
      	<div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <div id="content">
    <h1 class="bar">The Blog</h1>
  </div>
  <div class="clear"></div>
</div>
<div id="content-container">


<div id="fixit" class="blog-fixit">
<div id="fixit-tab"><p class="rotate">Archives</p></div>
  <div class="search-form">
    <?php get_search_form(); ?>
  </div>
  <h4>Browse by Date</h4>
  <ul class="archive-list">
    <?php wp_get_archives('limit=5'); ?>
  </ul>
  <h4>Browse by Category</h4>
  <ul class="category-list">
    <?php wp_list_categories('title_li='); ?>
  </ul>
</div>
