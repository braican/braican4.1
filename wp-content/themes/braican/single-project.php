<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="single-project">
		<div class="topborder">
			<div class="braica-container braica-larger">
				<div class="right-rail">
					<div class="logo"><span>b</span></div>
					<div class="nav">
						<ul>
							<li><a href="#work">Work</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="braica-container braica-larger br-cf">
			<span href="#" id="close-modal" class="icon-cancel"></span>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="project-header col">
					<div class="braica-block">
						<h3 class="project-title"><?php the_title(); ?></h3>
					</div>
				</header><!-- .project-header -->

				<div class="project-content col col2">
					<div class="braica-block">
						<?php the_field('braican_project_text'); ?>
						<?php if($link = get_field('braican_project_link')) : ?>
							<div>
								<a href="<?php echo $link ?>" target="_blank">Visit project</a>
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
