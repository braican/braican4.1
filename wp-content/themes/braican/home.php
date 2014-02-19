<?php
/**
 * home page
 *
 * @package braican
 */

get_header(); ?>

    <div id="content" class="site-content" role="main">
        
        <div class="main-bg bg-container">

            <!-- home section -->
            <section id="home" class="br-cf">
                <?php
                $id = 8;
                $page = get_page($id);
                $content = $page->post_content;
                $content = apply_filters('the_content', $content);
                $fact = get_posts(array(
                    'posts_per_page'   => 1,
                    'orderby'          => 'rand',
                    'post_type'        => 'funfact'
                )); ?>

                <div class="braica-container br-cf parallax-it">
                    <div class="col col4">
                        <div class="braica-block">
                            <?php echo $content; ?>
                            <p>I also <?php print_r($fact[0]->post_title); ?>, but that's probably less important.</p>
                        </div>
                    </div>
                </div>
            </section><!-- #home -->
        </div>
        
        <!-- PROJECTS -->
        <?php $args = array( 'post_type' => 'project', 'posts_per_page' => -1, 'post_status' => 'publish' ); ?>
        <?php $loop = new WP_Query( $args ); ?>
        <?php if($loop->have_posts()): ?>
            <section id="work" class="br-cf">    

                <div class="braica-container br-cf">
                    
                    <!-- the project thumbs -->
                    <div class="project-group br-cf">
                        
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php if(has_post_thumbnail()) : ?>
                                <?php $categories = wp_get_post_terms($post->ID, 'project_categories'); ?>
                                <div class="col col2<?php foreach($categories as $cat){echo " " . $cat->slug;} ?>">
                                    <div class="braica-block">
                                        <a href="<?php the_permalink(); ?>" data-project="#/<?php echo $post->post_name; ?>" class="project-thumb">
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
        <div class="about-bg bg-container">
            <section id="about" class="br-cf">
                
                <?php $id = 10; ?>
                <?php $page = get_page($id); ?>
                <?php $content = $page->post_content; ?>
                <?php $content = apply_filters('the_content', $content); ?>

                <div class="braica-container br-cf">
                    <div class="col col4 right">
                        <div class="braica-block">
                            <?php echo $content; ?>
                        </div>
                    </div>

                    <div class="col col2 left">
                        <div class="braica-block">
                            <a class="button" href="#">View the resume</a>
                        </div>
                    </div>
                </div>
                
            </section><!-- #about -->
        </div>


        <!-- CONTACT -->
        <section id="contact" class="br-cf">
            <?php $id = 11; ?>
            <?php $page = get_page($id); ?>
            <?php $content = apply_filters('the_content', $page->post_content); ?>
            
            <div class="braica-container br-cf">
                
                <div class="col col3">
                    <div class="braica-block">
                        <?php echo $content; ?>
                        <div id="social">
                            <a href="http://twitter.com/braican" target="_blank" class="twitter">Twitter</a>
                            <a href="http://facebook.com/braica.n" target="_blank" class="facebook">Facebook</a>
                            <a href="http://linkedin.com/in/nicholasbraica" target="_blank" class="linkedin">LinkedIn</a>
                        </div>
                    </div>
                </div>
                <div class="col col3">
                    <div class="braica-block">
                        <div class="the-form">
                            <?php echo do_shortcode('[cscf-contact-form]'); ?>      
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- #contact -->

    </div><!-- #content -->


<?php get_footer(); ?>