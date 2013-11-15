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
	<span href="#" id="close-modal" class="icon-cancel"></span>
	<div id="project-content"></div>
</div>

<?php wp_footer(); ?>

</body>
</html>