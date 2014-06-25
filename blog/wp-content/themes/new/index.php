<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content">
  <?php if (have_posts()) : ?>
  
  
  <?php while (have_posts()) : the_post(); ?>
  <div <?php post_class('clear') ?> id="post-<?php the_ID(); ?>">
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
    <div class="clear"></div>
  </div>
  
  <?php endwhile; ?>
  <div class="navigation" class="clear">
    <div class="alignleft">
      <?php previous_posts_link('&laquo; Newer Entries') ?>
    </div>
    <div class="alignright">
      <?php next_posts_link('Older Entries &raquo;') ?>
    </div>
    <div style="clear"></div>
  </div>
  <?php else : ?>
  <h2 class="center">Not Found</h2>
  <p class="center">Sorry, but you are looking for something that isn't here.</p>
  <?php get_search_form(); ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>