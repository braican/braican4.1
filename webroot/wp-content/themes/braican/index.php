<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package braican
 */

get_header(); ?>

	<div id="primary" class="content-area colored-background">
		<div id="content" class="site-content braica-container" role="main">
			<section class="braica-block br-cf">
				<div class="col col4">
					<?php if ( have_posts() ) : ?>
						
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							?>
							
						<?php endwhile; ?>
						
						
					<?php else : ?>

						<?php get_template_part( 'no-results', 'index' ); ?>
					
					<?php endif; ?>
				</div>
				<div class="col col2">
					<?php get_sidebar(); ?>
				</div>
			</section>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>