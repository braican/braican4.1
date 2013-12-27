<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package braican
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="braica-container">
			<div class="site-info">Copyright &copy; <?php echo date('Y'); ?> Nicholas Braica</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->

	
</div><!-- #page -->

<div id="project-modal">
	<div id="project-content"></div>
</div>

<div id="engage">
	<div class="braica-container br-cf">
		<div class="braica-block">
			<div class="tab">Engage</div>
		</div>
		<div class="the-form">
			<?php echo do_shortcode('[cscf-contact-form]'); ?>		
		</div>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>