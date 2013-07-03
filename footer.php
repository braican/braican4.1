

<div id="footer-container">
  <div id="footer">
	<p class="copy">&copy; braican.com and Nicholas V. Braica | <?php echo date('F, j, Y') ?></p>
  </div>
</div>


<?php 
	
	$url = $_SERVER['REQUEST_URI'];
	
	if($url == "/contact.php"){
		$displayHuh = "none";
	} else {
		$displayHuh = "block";
	}
	
?>

<div id="social-footer-fixed" style="display:<?php echo $displayHuh ?>">
  <div id="handle-container">
    <div id="the-handle">Let's get social</div>
  </div>
  <div id="footer">
    <div class="socialstuff"> <a href="http://www.facebook.com/braica.n" target="_blank" id="facebook" title="Facebook"></a> <a href="http://www.linkedin.com/profile/view?id=62870155" id="linkedin" target="_blank" title="LinkedInn"></a> <a href="http://twitter.com/#!/braican" id="twitter" target="_blank" title="Twitter"></a> <a href="http://www.youtube.com/user/nvbraica8" id="youtube" target="_blank" title="YouTube"></a> <a href="http://www.flickr.com/photos/braican/" id="flickr" target="_blank" title="Flickr"></a> <a href="/blog/feed/" id="rss" target="_blank" title="subscribe to the braican blog"></a> <a href="/contact.php" id="email"></a> </div>
    <p class="bottom-nav"><a href="/">Home</a> | <a href="/about.php">About</a> | <a href="/portfolio.php">Portfolio</a></p>
<p class="copy">&copy; braican.com and Nicholas V. Braica | <?php echo date('F, j, Y') ?></p>
  </div>
</div>

<script src="js/jquery-tools.js" type="text/javascript"></script>
<script src="js/braican.js" type="text/javascript"></script>

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


