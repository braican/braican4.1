<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braican
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php
			$projectArgs = array(
				'post_type'      => 'project',
				'posts_per_page' => -1
			);

			$projectQuery = new WP_Query($projectArgs);
		?>

		<?php if($projectQuery->have_posts()) : ?>
			<section class="projectgallery">
				<?php while($projectQuery->have_posts()) : $projectQuery->the_post() ?>
					<?php if(has_post_thumbnail()) : ?>
						<a class="projectgallery__thumb" href="<?php the_permalink() ?>">
							<div class="projectgallery__wrapper">
								<?php the_post_thumbnail('full'); ?>

								<div class="projectgallery__details">
									<div class="projectgallery__wrap">
										<?php the_title('<h3 class="projectgallery__title">', '</h3>'); ?>
										<?php sk_the_field('braican_project_excerpt', array('before' => '<div class="projectgallery__excerpt">', 'after' => '</div>')); ?>
									</div>
								</div>
							</div>
						</a>
					<?php endif; ?>
				<?php endwhile; ?>
				<a href="#" class="projectgallery__thumb projectgallery__thumb--promo">
					<div class="projectgallery__wrapper">
						<p class="projectgallery__promo">Let's get going on your project</p>
					</div>
				</a>
			</section>
		<?php endif; ?>
	</div><!-- #primary -->

<?php
get_footer();
