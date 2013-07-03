<!DOCTYPE html>
<html>
<head>
	<title>Australia by braican</title>
	
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	<script src="jquery.js"></script>
	<script src="australia.js"></script>
	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>

	
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20596099-6']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

	<div class="container">
	
		<h1 class="header">AUSTRALIA BY BRAICAN</h1>
		<?php 
			define('WP_USE_THEMES', false);
			require('../blog/wp-blog-header.php');
		?>

		<?php query_posts(array('category_name' => 'australia', 'posts_per_page' => -1 )); ?>
		<?php while (have_posts()) : the_post(); ?>
		  
		<div class="post">
			<h2 class="blog-title"><?php the_title(); ?></h2>
			<div class="date">
				<p class="day"><?php the_time('j'); ?></p>
				<p><?php the_time('F') ?></p>
				<p><?php the_time('Y') ?></p>
			</div>
			<div class="theblog">
				<!--<div class="excerpt"><?php // the_excerpt(); ?></div>-->
				<div class="full_entry"><?php the_content(); ?></div>
			</div>
			<div class="comments">
				<p class="showcomments"><span>show</span> comments</p>
				
				<div class="thecomments">
					<?php
					$withcomments = 1; // force comments form and comments to show on front page
					comments_template();
					?>
				</div>
			   
			</div>
		</div>
		<?php endwhile;?>
		
		<div class="footer">
			<p>this is a one-off by Nick Braica &copy; <?php echo date(Y); ?> | <a href="http://braican.com">braican.com</a></p>
		</div>
	 
	</div>
	<!-- /.conteiner -->
	
</body>
</html>