<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content">
  <?php if (have_posts()) : ?>
  <h2 class="pagetitle">Search Results</h2>
  
  
 <?php while (have_posts()) : the_post(); ?>
  <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <div id="blog-left">
      <h2 class="blog-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <div class="entry">
        <?php the_content('<span style="font-size:18px;">Keep reading &raquo;</span>'); ?>
      </div>
    </div>
    <div class="blog-right">
      <p class="blog-time"> <span>
        <?php the_time('F jS, Y') ?>
        </span></br />
        by
        <?php the_author() ?>
      </p>
      <div class="postmetadata"> Posted in<br />
        <?php the_category(', ') ?>
      </div>
      <div class="postmetadata">
        <?php the_tags('Tagged<br />', ', ', '<br />'); ?>
      </div>
      <div class="comments">
        <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
      </div>
      <h6 class="keep-reading"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Full post &#187;</a></h6>
    </div>
  </div>
  <div class="clear blog-separate"></div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php previous_posts_link('&laquo; Newer Entries') ?>
    </div>
    <div class="alignright">
      <?php next_posts_link('Older Entries &raquo;') ?>
    </div>
    <div style="clear"></div>
  </div>

  
  
  <?php else : ?>
  <div>
  <h2 class="center">No posts found. Try a different search?</h2>
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
  <?php endif; ?>
</div>
<?php get_footer(); ?>
