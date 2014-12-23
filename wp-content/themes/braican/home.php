<?php
/**
 * home page
 *
 * @package braican
 */

get_header(); ?>

    <div id="content" class="site-content" role="main">
        
        <!-- home section -->
        <section id="home" class="br-cf" data-section="page">
            <?php
            $id = 8;
            $page = get_page($id);
            $content = $page->post_content;
            $content = apply_filters('the_content', $content); ?>

            <div class="braica-container br-cf parallax-it">
                <div class="col col4">
                    <div class="braica-block">
                        <?php echo $content; ?>

                        <div id="fact">
                            <?php echo braican_new_fact(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #home -->
         
        <!-- PROJECTS -->
        <?php
        $loop = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        )); ?>
        <?php if($loop->have_posts()): ?>
            <section id="work" class="br-cf section" data-section="work">

                <div class="braica-container br-cf">
                    <div class="mobile-section-navigation">
                        <i class="icon-angle-up"></i>
                        <i class="icon-angle-down"></i>
                    </div>
                    
                    <!-- the project thumbs -->
                    <div class="project-group br-cf">
                        
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php if(has_post_thumbnail()) : ?>
                                <?php $categories = wp_get_post_terms($post->ID, 'project_categories'); ?>
                                <div class="col col2<?php foreach($categories as $cat){echo " " . $cat->slug;} ?>">
                                    <div class="braica-block">
                                        <a href="<?php the_permalink(); ?>" data-project="<?php echo $post->post_name; ?>" data-id="<?php echo $post->ID; ?>" class="project-thumb">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="overlay">
                                                <div class="overlay-icon">
                                                    <i class="icon-plus"></i>    
                                                </div>
                                                <div class="overlay-content">

                                                    <h4><?php the_title(); ?></h4>
                                                    <p><?php the_field('braican_project_excerpt') ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                            <?php endif; ?>

                        <?php endwhile; ?>
                        
                    </div><!-- .project-group -->
                </div>
            </section><!-- #projects -->
        <?php endif; ?>
        
        <!-- ABOUT -->
        <section id="about" class="br-cf" data-section="about">
            
            <?php $id = 10; ?>
            <?php $page = get_page($id); ?>
            <?php $content = $page->post_content; ?>
            <?php $content = apply_filters('the_content', $content); ?>

            <div class="braica-container br-cf">
                <div class="mobile-section-navigation">
                    <i class="icon-angle-up"></i>
                    <i class="icon-angle-down"></i>
                </div>

                <div class="col col4 right">
                    <div class="braica-block">
                        <?php echo $content; ?>
                        <p><a class="button" href="/wp-content/uploads/docs/NickBraica-resume-2014.02.28.pdf" target="_blank">Check out the resume</a></p>
                    </div>
                </div>

                <div class="col col2 left">
                    <div class="braica-block">
                        <aside class="last-beer">
                            <h5><i class="icon-bottle"></i> <span>The last beer I had</span></h5>
                            <div class="quoted-content">
                                <?php echo get_option('last_beer'); ?>
                                <p><a href="https://untappd.com/user/braican">via Untappd</a></p>
                            </div>
                        </aside>

                        <aside class="last-tweet">
                            <h5><i class="icon-twitter-bird"></i> <span>The last thought I tweeted</span></h5>
                            <div class="quoted-content">
                                <?php the_widget( 'Latest_Tweets_Widget', array(
                                    'title' => '',
                                    'num' => 1,
                                    'rts' => 1,
                                    'ats' => 1
                                )); ?>
                                <p><a href="http://twitter.com/braican">@braican</a></p>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            
        </section><!-- #about -->


        <!-- CONTACT -->
        <section id="contact" class="br-cf section" data-section="contact">
            <?php $id = 11; ?>
            <?php $page = get_page($id); ?>
            <?php $content = apply_filters('the_content', $page->post_content); ?>
            
            <div class="braica-container br-cf">

                <div class="mobile-section-navigation">
                    <i class="icon-angle-up"></i>
                </div>
                
                <div class="col col4 variable-width">
                    <div class="braica-block">
                        <?php echo $content; ?>
                    </div>
                </div>
                <div class="col col2 variable-width">
                    <div class="braica-block">
                        <aside class="the-form">
                            <h5><i class="icon-mail"></i>Let's chat</h5>
                            <?php echo do_shortcode('[cscf-contact-form]'); ?>      
                        </aside>
                    </div>
                </div>
            </div>

        </section><!-- #contact -->

    </div><!-- #content -->


<?php get_footer(); ?>