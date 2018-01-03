<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package braican
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article__content'); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php braican_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="project__wrapper">

		<div class="project__main content__main">

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer">

				<?php if ($projectLink = get_field('braican_project_link')) : ?>
					<?php if ($projectLink['url']) : ?>
						<?php $linkText = $projectLink['title'] ? $projectLink['title'] : 'Learn more'; ?>
						<?php echo "<a href=\"{$projectLink['url']}\" target=\"_blank\" class=\"a-cta\">$linkText</a>"; ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php braican_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>

		<?php if(have_rows('braican_project_assets')) : ?>
			<aside class="project__media">
				<ul>
					<?php while (have_rows('braican_project_assets')) : the_row(); ?>
						<li class="project__asset">
							<?php
								sk_the_subfield('embeddable');
								sk_the_subfield('image', array(
									'filter' => 'sk_image_markup',
								));
							?>
						</li>
					<?php endwhile; ?>
				</ul>
			</aside>
		<?php endif; ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->

	


