<?php
/**
 * home page
 *
 * @package braican
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">
		<!-- home section -->
		<section id="home">
			<?php $id = 8; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			<div class="page_content"><?php echo $content; ?></div>
		</section>
		
		<!-- projects section -->
		<?php $args = array( 'post_type' => 'project', 'posts_per_page' => -1 ); ?>
		<?php $loop = new WP_Query( $args ); ?>
		<?php if($loop->have_posts()): ?>
			<section id="projects">
				<h1>Projects</h1>

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="project">
					<h2><?php the_title(); ?></h2>
				</div>
			<?php endwhile; ?>
			</section>
		<?php endif; ?>
		

		<!-- about section -->
		<section id="about">
			<?php $id = 10; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			<h1><?php echo $page->post_title; ?></h1>
			<div class="page_content"><?php echo $content; ?></div>
		</section>

		<!-- contact section -->
		<section id="contact">
			<?php $id = 11; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			<h1><?php echo $page->post_title; ?></h1>
			<div class="page_content"><?php echo $content; ?></div>
		</section>

	</div><!-- #content -->


<?php get_footer(); ?>