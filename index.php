<?php include('header.php') ?>

<title>Nicholas V. Braica</title>

<script type="text/javascript">
function randofact() {
	var fact = Array(	"he'll learn how to fly an airplane.",
						"he'll have seen Europe.",
						"he'll have eaten at all the restaurants in the North End of Boston.", 
						"he'll own a boat.",
						"he'll become an expert water skiier."
					)
	var one = Math.round((fact.length - 1)*Math.random());
	
	document.write(fact[one]);
}
</script>

</head>

<body>

<div id="index-bg">
  <?php include('nav.php') ?>
  
  <div id="slideshow">
    <div id="featured">
    	<a href="portfolio.php"><img src="assets/index-slideshow/braican-index.png" border="0" /></a>
      <img src="assets/index-slideshow/snow.jpg" border="0" />
    	<a href="case-studies/tgfln.php"><img src="assets/index-slideshow/tgfln_index.jpg" border="0" /></a>
    	<a href="case-studies/mascotlovin.php"><img src="assets/index-slideshow/mascotlovin-index.jpg" border="0" /></a>
    	</div>
  	</div>
    
  <noscript>
  <div style="background-color:#FF0; color:#000; font-family:Century Gothic, Arial, Helvetica, sans-serif; width:330px; padding:10px; margin:0px auto;">
    <h3 style="text-align:center">Site look funky?</h3>
    <p>It's probably because you don't have JavaScript turned on. If this is the case, <strong>turn on JavaScript.</strong> Otherwise, this site won't look as cool as it should.</p>
  </div>
  </noscript>
  
</div>
<div id="content-container">
  <div id="content">
    <div style="height:20px;"></div>
    <div class="left">
      <h1 class="bar">braican is Nicholas Braica</h1>
      <div class="clear"></div>
      <div class="divbox">
        <p>He's a web developer, graphic designer, and multimedia guy from Boston who likes to make things work. In his spare time, he develops stuff, runs around outside, and hopes that someday, <script type="text/javascript">randofact();</script></p>
        <p>Don't be shy. <a href="contact.php">Get in touch</a>.</p>
      </div>
    </div>
    <div class="right socialbox">
      <div id="twitter-bird">
        <h4>I Tweet things <a class="twitter_name" href="http://www.twitter.com/braican" target="_blank"><strong style="text-decoration: underline;">@braican:</strong></a></h4>
      </div>
      <div class="tweet"></div>
    </div>
    <div class="clear" style="height:40px;"></div>
    
    <!-- THE BLOG -->
    <div class="blog top-border">
      <h2 class="section-header" style="top:-26px;"><a href="blog/">The Blog</a></h2>
      <?php 
/* Short and sweet */
define('WP_USE_THEMES', false);
require('blog/wp-blog-header.php');
?>
      <?php query_posts('showposts=1'); ?>
      <?php while (have_posts()) : the_post(); ?>
      <div class="left">
        <h2 class="blog-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h2>
        <div class="entry">
          <?php the_excerpt(); ?>
        </div>
      </div>
      <div class="blog-right">
        <?php the_time('F jS, Y') ?>
        <!-- by <?php //the_author() ?> -->
        
        <p class="postmetadata"> Posted in<br />
          <?php the_category(' | ') ?>
        </p>
        <p class="postmetadata" style="font-size:16px;">
          <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
        </p>
        <h6 class="keep-reading"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Keep reading &#187;</a> </h6>
      </div>
      <div class="clear"></div>
    </div>
    <?php endwhile;?>
  </div>
  <!-- .blog -->
  
  <div class="clear"></div>
</div>
</div>

<?php include('footer.php') ?>

<script src="js/tweet.js" type="text/javascript"></script>
<script src="js/jquery.orbit-1.2.3.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#featured').orbit({
		animation: 'horizontal-slide',
		bullets: true,
		advanceSpeed: 7000
	});
});
</script>

<script type="text/javascript">
$(".tweet").tweet({
    	username: "braican",
        count: 1,
        loading_text: "loading tweets..."
	});

</script>



</body>
</html>



