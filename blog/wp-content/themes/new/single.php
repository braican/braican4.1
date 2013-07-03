<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
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
    </div>
  </div>
  <div class="clear blog-separate"></div>
  
 <?php comments_template(); ?>
  <?php endwhile; ?>
  
    <div class="navigation">
    <div class="alignleft left-bracket">
      <?php next_post_link('%link') ?>
    </div>
    <div class="alignright right-bracket">
      <?php previous_post_link('%link') ?>
    </div>
    <div class="clear"></div>
  </div>
  
  <?php else: ?>
  
  <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>
  
</div>
<?php get_footer(); ?>
