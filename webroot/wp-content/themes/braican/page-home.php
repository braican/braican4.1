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
						<div class="projectgallery__thumb">
							<a
								class="projectgallery__link"
								href="<?php the_permalink() ?>"
								title="<?php the_title(); ?>"
								style="background-image:url(<?php echo get_the_post_thumbnail_url() ?>)"
							></a>

							<a class="projectgallery__details" href="<?php the_permalink(); ?>">
								<?php the_title('<h3 class="projectgallery__title">', '</h3>'); ?>
								<?php sk_the_field('braican_project_excerpt', array('before' => '<div class="projectgallery__excerpt">', 'after' => '</div>')); ?>
							</a>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</section>
		<?php endif; ?>
	</div><!-- #primary -->

<?php
get_footer();
