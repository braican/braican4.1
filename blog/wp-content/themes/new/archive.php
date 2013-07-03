<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();?>


<div id="content">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>


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
  <h2 class="center">Not Found</h2>
  <p class="center">Sorry, but you are looking for something that isn't here.</p>
  <?php get_search_form(); ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
