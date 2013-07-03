<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content">
		<h2 class="center">Error 404 - Not Found</h2>
		
		<hr />

<h2 class="center">Sorry, we couldn't find what you're looking for.<br />Maybe try a search?</h2>
  <?php get_search_form(); ?>
  
  <h2 style="margin-top:30px;">Or, check out the latest posts: </h2>
  
  <?php
    $args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 10,
      'caller_get_posts'=> 1
      );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <p><?php the_time('m.d.y') ?> <strong>| <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong></p>
       <?php
      endwhile;
    }
wp_reset_query();  // Restore global post data stomped by the_post().
?>


</div>


<?php get_footer(); ?>