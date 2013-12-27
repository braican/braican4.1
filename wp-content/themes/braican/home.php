<?php
/**
 * home page
 *
 * @package braican
 */

get_header(); ?>

    <div id="content" class="site-content" role="main">
        
        <div class="main-bg bg-container">
            <section id="above-home" class="br-cf"></section>

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
                
                <div class="topborder">
                    <div class="braica-container">
                        <div class="right-rail">
                            <div class="logo"><span>b</span></div>
                            <div class="nav">
                                <ul>
                                    <li><a href="#work">Work</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="mobile-hamburger">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

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
        <?php $args = array( 'post_type' => 'project', 'posts_per_page' => -1 ); ?>
        <?php $loop = new WP_Query( $args ); ?>
        <?php if($loop->have_posts()): ?>
            <section id="work" class="br-cf">
                
                <div class="topborder">
                    <div class="braica-container">
                        <div class="right-rail">
                            <div class="nav collapsed">
                                <ul>
                                    <li class="active"><a href="#work">Work</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="mobile-hamburger">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                

                <div class="braica-container br-cf">

                    <!-- the navigation -->
                    <?php $term_type = "project_categories"; ?>
                    <?php $work_types = get_terms($term_type); ?>
                    <?php if($work_types) : ?>
                        <div class="categories">
                            <ul>
                                <?php foreach ($work_types as $t) : ?>
                                    <li><a href="#" data-category="<?php echo $t->slug; ?>"><?php echo $t->name; ?></a></li>
                                <?php endforeach; ?>
                                <li><a href="#" class="showall">show all</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- the project thumbs -->
                    <div class="project-group br-cf">
                        
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <?php if(has_post_thumbnail()) : ?>
                                <?php $categories = wp_get_post_terms($post->ID, $term_type); ?>
                                <div class="col col2<?php foreach($categories as $cat){echo " " . $cat->slug;} ?>">
                                    <div class="braica-block">
                                        <a href="<?php the_permalink(); ?>" data-project="#/<?php echo $post->post_name; ?>" class="project-thumb">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="overlay">
                                                <h4><?php the_title(); ?></h4>
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
                
                <div class="topborder">
                    <div class="braica-container">
                        <div class="right-rail">
                            <div class="nav collapsed">
                                <ul>
                                    <li><a href="#work">Work</a></li>
                                    <li class="active"><a href="#about">About</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="mobile-hamburger">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <div class="braica-container br-cf">
                    <div class="col col4 right">
                        <div class="braica-block">
                            <?php echo $content; ?>
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

            <div class="topborder">
                <div class="braica-container">
                    <div class="right-rail">
                        <div class="nav collapsed">
                            <ul>
                                <li><a href="#work">Work</a></li>
                                <li><a href="#about">About</a></li>
                                <li class="active"><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mobile-hamburger">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
            
            <div class="braica-container br-cf">
                
                <div class="col col4">
                    <div class="braica-block">
                        <?php echo $content; ?>
                    </div>
                </div>
                <div class="col col2">
                    <div class="braica-block">
                        <a class="button" href="#">View the resume</a>
                    </div>
                </div>
            </div>

        </section><!-- #contact -->

    </div><!-- #content -->


<?php get_footer(); ?>