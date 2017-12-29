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

	<footer id="colophon" class="site-footer">
		<p>Ready to start your next great project? Get in touch using the convenient prompt below, and let's make something awesome.</p>
		<?php echo do_shortcode('[contact-form-7 id="315" title="Contact form 1"]'); ?>
		<div class="site-info">
			<p>&copy; <?php echo date('Y'); ?> | braican</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
