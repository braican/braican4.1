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

	<div id="project-modal">
		<div class="braica-container br-cf">
			<div id="single-project"></div>
		</div>
		
	</div>

	<div id="loading"></div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="braica-container">
			<div class="site-info">Copyright &copy; <?php echo date('Y'); ?> Nicholas Braica</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->

	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>