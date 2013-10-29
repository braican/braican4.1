<?php
/**
 * home page
 *
 * @package braican
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">

		<!-- home section -->
		<section id="home" class="clearfix">
			<?php $id = 8; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>

			<div class="braica-container topborder"></div>
			<div class="braica-container br-cf">
				<div class="col col4">
					<div class="braica-block">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		</section>
		
		<!-- projects section -->
		<?php $args = array( 'post_type' => 'project', 'posts_per_page' => -1 ); ?>
		<?php $loop = new WP_Query( $args ); ?>
		<?php if($loop->have_posts()): ?>
			<?php $project_list = array(); ?>
			<section id="projects" class="clearfix">
				<div class="braica-container topborder">
					<div class="right-rail">
						<h3>Projects</h3>
					</div>
				</div>
				<div class="braica-container br-cf">
					<div class="project-group">
						
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php $project_list[get_the_title()] = get_permalink(); ?>
							<?php if(has_post_thumbnail()) : ?>
								<div class="col col2">
									<div class="braica-block">
										<a href="<?php the_permalink(); ?>" class="project-thumb">
											<div class="underlay">
												<h4><?php the_title(); ?></h4>

											</div>
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								</div>
								
							<?php endif; ?>

						<?php endwhile; ?>
						
					</div><!-- .project-group -->

					<div class="project-area"></div><!-- .project-area -->

					<img class="loader" src="<?php echo get_template_directory_uri(); ?>/img/load.gif">
				</div>

				
			</section>
		<?php endif; ?>
		
		<!-- about section -->
		<section id="about" class="clearfix">
			<?php $id = 10; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			<div class="braica-container topborder">
				<div class="right-rail">
					<h3><?php echo $page->post_title; ?></h3>
				</div>
			</div>
			<div class="braica-container br-cf">
				<div class="col col4 right">
					<div class="braica-block">
						<?php echo $content; ?>
					</div>
				</div>

				
			</div>
			
		</section>

		<!-- contact section -->
		<section id="contact" class="clearfix">
			<?php $id = 11; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			<div class="braica-container topborder">
				<div class="right-rail">
					<h3><?php echo $page->post_title; ?></h3>
				</div>
			</div>
			<div class="braica-container br-cf">
				<div class="col col4 right">
					<div class="braica-block">
						<?php echo $content; ?>
					</div>
				</div>

				
			</div>
		</section>

	</div><!-- #content -->


<?php get_footer(); ?>