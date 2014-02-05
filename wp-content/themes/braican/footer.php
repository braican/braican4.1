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
		
		<div id="single-project">
			<div class="topborder">
				<div class="braica-container">
					<div class="braica-block">
						<div class="right-rail">
							<div class="logo"><span>nb</span></div>
							<div class="nav">
								<ul>
									<li><a href="#work">Work</a></li>
									<li><a href="#about">About</a></li>
									<li><a href="#contact">Contact</a></li>
									<li>
										<div id="close-modal">
											<div class="icon-cancel"></div>
											<div>Close project</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="braica-container br-cf" id="project-content"></div>
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