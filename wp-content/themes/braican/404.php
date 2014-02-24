<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package braican
 */

get_header(); ?>

	
	<div id="content" class="site-content notfound" role="main">
		
		<div class="braica-container br-cf">
			<article id="post-0" class="post not-found">
				<div class="braica-block">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'braican' ); ?></h1>
					</header><!-- .entry-header -->
				</div>
				
				<div class="col col2">
					<div class="entry-content braica-block">
						<p><?php _e( 'It looks like nothing was found at this location. Instead, enjoy this photo of me getting wicked air on a snow tube.', 'braican' ); ?></p>
					</div><!-- .entry-content -->
				</div>

				<div class="col col4">
					<div class="img-container"></div>
				</div>
			</article><!-- #post-0 .post .error404 .not-found -->
		</div>

	</div><!-- #content -->

<?php get_footer(); ?>