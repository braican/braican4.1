<?php include('header.php'); ?>
<title>Contact | Nicholas V. Braica</title>

<script src="js/jquery-tools.js" type="text/javascript"></script>
<script src="js/jquery.contactable.js" type="text/javascript"></script>
<script src="js/jquery.validate.pack.js" type="text/javascript"></script>
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

</head>

<body>
<div id="contact-bg">
  <div id="header-container">
    <div id="header"> <a href="index.php"><img class="logo" src="assets/logo/logo.png" border="0" /></a>
      <ul id="navigation">
        <li><a href="about.php">More Info</a></li>
        <li><a href="portfolio.php">The Work</a></li>
        <li><a href="blog/">My Thoughts</a></li>
        <li><a href="contact.php" class="active">Let's Talk</a></li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <div id="content">
    <h1 class="bar">Contact me</h1>
  </div>
  <div class="clear"></div>
</div>

<div id="content-container">
  <div id="content">
  
  <div class="left">
  <h2>I like making friends.</h2>
  
  <p>So let's talk. Got a project? Let me know what I can do to help. Want to say hello? I'd enjoy that too. Don't trust forms? Email me at <a href="mailto:nick@braican.com">nick@braican.com</a>. Or look to your right to see all the places on the internet that I hang out at. I promise I'll respond.</p>
 
    <div id="contact"></div>
  
  </div>


  <div class="right">
  

  <h4 style="margin-bottom:20px;">You can find me in (or around)</h4>
<img src="/assets/boston-image.png" />

 
       <div class="aboutpage-socialstuff" style="margin-top:20px;">
      <a href="http://www.facebook.com/braica.n" target="_blank" id="facebook" title="Facebook"></a> <a href="http://www.linkedin.com/profile/view?id=62870155" id="linkedin" target="_blank" title="LinkedInn"></a> <a href="http://twitter.com/#!/braican" id="twitter" target="_blank" title="Twitter"></a> <a href="http://www.youtube.com/user/nvbraica8" id="youtube" target="_blank" title="YouTube"></a> <a href="http://www.flickr.com/photos/braican/" id="flickr" target="_blank" title="Flickr"></a> <a href="/blog/feed/" id="rss" target="_blank" title="subscribe to the braican blog"></a>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
  </div>

	<div class="clear"></div>

  </div>
</div>

<div id="footer-container">
  <div id="footer">
    <p>braican.com &copy; Nicholas V. Braica | 2011</p>
  </div>
</div>
<script type="text/javascript">

 $('#contact').contactable({
 	subject: "So what's up?"
 });

</script>
</body>
</html>
