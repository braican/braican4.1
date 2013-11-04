

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('project-detail'); ?>>
		<header class="project-header">
			<h3 class="project-title"><?php the_title(); ?></h3>
		</header><!-- .project-header -->

		<div class="project-content">
			<?php the_content(); ?>
		</div><!-- .project-content -->

		<div class="project-gallery">
			<?php $gallery_id = get_field('braica_gallery'); ?>
			<?php $gallery = get_post_gallery($gallery_id[0]); ?>
			<?php print_r($gallery); ?>
		</div>

		<footer class="project-meta">
			<?php edit_post_link( __( 'Edit', 'braican' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .project-meta -->
	</article><!-- #post-## -->


<?php endwhile; // end of the loop. ?>