<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/master.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact | braican.com</title>
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
<?php
if(isset($_POST)) {
	$to = "nvbraica8@gmail.com";
	$subject = $_POST['subject'];
	$name_field = $_POST['name'];
	$email_field = $_POST['email'];
	$message = $_POST['message'];
 
	$body = "From: $name_field\n E-Mail: $email_field\n Message:\n $message";
 
	mail($to, $subject, $body);
}
else {
	echo "How did you get here?";
}
?>

 <div id="content"> <!-- #BeginLibraryItem "/Library/social_side.lbi" -->
  <ul class="side_content">
    <li id="facebook"><a href="http://www.facebook.com/profile.php?id=620290491" title="Connect on Facebook" target="_blank"></a></li>
    <li id="linkedin"> <a href="http://www.linkedin.com/in/nicholasbraica" title="Connect on LinkedIn" target="_blank"></a></li>
    <li id="youtube"><a href="http://www.youtube.com/user/nvbraica8" title="View my videos on YouTube" target="_blank"></a></li>
    <li id="flickr"><a href="http://www.flickr.com/photos/braican/" title="View my photos on Flickr" target="_blank"></a></li>
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
          <li><a href="contact.html" class="active">CONTACT</a></li>
          |
          <li><a href="about.html">ABOUT</a></li>
          |
          <li><a href="resume.html">RESUME</a></li>
        </ul>
      </div>
    </div>
    
    
    <div class="main-content">
      
      
      <div id="main">
        <h1>Thanks for getting in touch.</h1>
        <p>I'll be sure to get back to you as soon as I can.</p>
        
        <p>In case you missed it, my services are available for hire, and I'm always looking for a new project to tackle. Take a look around my portfolio to <a href="portfolio.html">see what I can do</a>, and let me know what I can help you with. Or just say hello.</p>
        <p>There are plenty of ways to get in touch.</p>
      </div>
      <div id="main">
        <div class="contact_page">
          <div class="facebook_pic"><a href="http://www.facebook.com/profile.php?id=620290491" title="Connect on Facebook" target="_blank"></a></div>
          <p>Everyone has a Facebook profile. What I think is funny is how people are hiding them. I think it's a good connection resource.</p>
        </div>
        <div class="contact_page">
          <div class="linkedin_pic"><a href="http://www.linkedin.com/in/nicholasbraica" title="Connect on LinkedIn" target="_blank"></a></div>
          <p>I only just recently got a LinkedIn profile. So I don't have too many connections. I guess I'm asking for help here.</p>
        </div>
        <div class="contact_page">
          <div class="youtube_pic"><a href="http://www.youtube.com/user/nvbraica8" title="View my videos on YouTube" target="_blank"></a></div>
          <p>I've got a YouTube profile, too. Everything that's there is also posted here, but if you want to be YouTube friends, I'm all for it.</p>
        </div>
        <div class="contact_page" style="width:155px;">
          <div class="flickr_pic"><a href="http://www.flickr.com/photos/braican/" title="View my photos on Flickr" target="_blank"></a></div>
          <p>In addition to pictures of my work on my site, Flickr has all the work I've ever photographed, as well as some personal photo albums. Just one more way to connect.</p>
        </div>
        <div style="clear:both"> </div>
      </div>
      
      
      <div id="main" style="clear:both;">
        <p>Or, you can send me an email, right from here. Convenient, huh?</p>
        <form method="POST" action="contact.php">
          <table cellpadding="5">
            <tr>
              <td align="right">Name</td>
              <td><input type="text" name="name" size="40" /></td>
            </tr>
            <tr>
              <td align="right">Email</td>
              <td><input type="text" name="email" size="40" /></td>
            </tr>
            <tr>
              <td align="right">Subject</td>
              <td><input type="text" name="subject" size="40" /></td>
            </tr>
            <tr>
              <td align="right" valign="top">Message</td>
              <td><textarea rows="10" name="message" cols="50"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td align="right"><input type="image" name="submit" src="assets/submit.png" alt="submit" />
                
                <!--   <input type="submit" value="Submit" name="submit" />--></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
  <!-- #BeginLibraryItem "/Library/copyright.lbi" -->
  <div id="copyright">
    <p>&copy; braican.com 2010. Designed by Nicholas V. Braica <br />
      Blog powered by <a href="http://wordpress.org/" target="_blank">WordPress</a></p>
  </div>
  <!-- #EndLibraryItem --></div>
</body>
</html>