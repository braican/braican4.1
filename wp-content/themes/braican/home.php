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
			<div class="left-band">
				&nbsp;
			</div>
			<?php $id = 8; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			<div class="section-content">
				<?php echo $content; ?>
			</div>
		</section>
		
		<!-- projects section -->
		<?php $args = array( 'post_type' => 'project', 'posts_per_page' => -1 ); ?>
		<?php $loop = new WP_Query( $args ); ?>
		<?php if($loop->have_posts()): ?>
			<section id="projects" class="clearfix">
				<div class="left-band">
					<h2>Projects</h2>
				</div>
				<div class="project-group clearfix">
					<div id="freetile mosaic">
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php if(has_post_thumbnail()) : ?>
								<a href="<?php the_permalink(); ?>" class="project-thumb">
									<div class="underlay">
										<h4><?php the_title(); ?></h4>

									</div>
									<?php the_post_thumbnail(); ?>
								</a>
								
							<?php endif; ?>

						<?php endwhile; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
		
		<!-- about section -->
		<section id="about" class="clearfix">
			<?php $id = 10; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			
			<div class="left-band">
				<h2><?php echo $page->post_title; ?></h2>
			</div>
			
			<div class="section-content">
				<?php echo $content; ?>
			</div>
		</section>

		<!-- contact section -->
		<section id="contact" class="clearfix">
			<?php $id = 11; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>

			<div class="left-band">
				<h2><?php echo $page->post_title; ?></h2>
			</div>
			
			<div class="page-content">
				<?php echo $content; ?>
			</div>
		</section>

	</div><!-- #content -->


<?php get_footer(); ?>