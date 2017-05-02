<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div class="single-project-container">
		<div class="braica-container br-cf" id="single-project">
			<article id="post-<?php the_ID(); ?>" <?php post_class('br-cf'); ?>>
				<header class="project-header col">
					<div class="braica-block">
						<h2 class="project-title"><?php the_title(); ?> <a href="/" class="close-modal"><i class="icon-cancel"></i></a></h2>
					</div>
				</header><!-- .project-header -->

				<div class="project-content col col2">
					<div class="braica-block">
						<?php the_field('braican_project_text'); ?>
						<?php if($link = get_field('braican_project_link')) : ?>
							<div class="braica-cta">
								<a href="<?php echo $link ?>" target="_blank"><?php the_field('braican_project_link_text'); ?><i class="icon-angle-right"></i></a>
							</div>
						<?php endif; ?>
					</div>
				</div><!-- .project-content -->
				
				<div class="project-gallery col col4">
					<div class="braica-block">
						<?php if(get_field('braican_project_media')) : ?>
							<?php print(get_field('braican_project_media')); ?>
						<?php endif; ?>
						<?php if(has_shortcode($post->post_content, 'gallery')) : ?>
							<?php $gallery = get_post_gallery_images( $post ); ?>
							<?php foreach($gallery as $img) : ?>
								<div class="img-container">
									<img src="<?php echo $img; ?>" alt="">
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				

				<footer class="project-meta">
					<?php edit_post_link( __( 'Edit', 'braican' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .project-meta -->
			</article><!-- #post-## -->
		</div>
	</div>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
