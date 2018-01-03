<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package braican
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer l-container">
		<p>Ready to start your next great project? Awesome. I've started an message for you below. Just add your name and email and maybe some info on what you're looking to do, and I'll get in touch as soon as I can.</p>
		<div class="content__main">
			<?php echo do_shortcode('[contact-form-7 id="315" title="Contact form 1"]'); ?>
		</div>
		<div class="site-info">
			<p>&copy; <?php echo date('Y'); ?> | braican</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
