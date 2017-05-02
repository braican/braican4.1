<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package braican
 */

get_header(); ?>

	
	<div id="content" class="site-content" role="main">
		<section class="notfound crazy-air">
			<article id="post-0" class="post not-found braica-container">
				<div class="braica-block">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( "Uh oh, you're looking for something that doesn't exist.", 'braican' ); ?></h1>
					</header><!-- .entry-header -->
				</div>
				<div class="entry-content braica-block br-cf">
					<div class="col col2">
						<p><?php _e( 'Sorry about that. As consolation, I hope you enjoy this photo of me getting wicked air on a snow tube.', 'braican' ); ?></p>
					</div>
				</div><!-- .entry-content -->
			</article>	
		</section>

	</div><!-- #content -->

<?php get_footer(); ?>