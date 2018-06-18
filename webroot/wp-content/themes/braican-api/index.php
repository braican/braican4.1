<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<main>
	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) :
			the_post(); ?>

		<article <?php post_class(); ?>>
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			<div>
				<?php the_content(); ?>
			</div>
		</article>

	<?php
		endwhile;
	else :
	?>
	<h2>No posts found.</h2>
	<?php
	endif;
	?>
</main>

<?php wp_footer(); ?>

</body>
</html>