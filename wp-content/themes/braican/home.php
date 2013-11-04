<?php
/**
 * home page
 *
 * @package braican
 */

get_header(); ?>

	<div id="content" class="site-content" role="main">

		<!-- home section -->
		<section id="home" class="br-cf">
			<?php $id = 8; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			
			<div class="topborder">
				<div class="braica-container">
					<div class="right-rail">
						<div class="logo"></div>
						<div class="nav">
							<ul>
								<li><a href="#work">Work</a></li>
								<li><a href="#about">About</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="braica-container br-cf parallax-it">
				<div class="col col4">
					<div class="braica-block">
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		</section><!-- #home -->
		
		<!-- PROJECTS -->
		<?php $args = array( 'post_type' => 'project', 'posts_per_page' => -1 ); ?>
		<?php $loop = new WP_Query( $args ); ?>
		<?php if($loop->have_posts()): ?>
			<?php $project_list = array(); ?>
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
					</div>
				</div>

				<div class="braica-container br-cf">
					<?php $work_types = get_terms('project_categories'); ?>
					<?php if($work_types) : ?>
						<div class="categories">
							<ul>
								<?php foreach ($work_types as $t) : ?>
									<li><a href="#"><?php echo $t->name; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<div class="project-group">
						
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php $project_list[get_the_title()] = get_permalink(); ?>
							<?php if(has_post_thumbnail()) : ?>
								<div class="col col2">
									<div class="braica-block">
										<a href="<?php the_permalink(); ?>" class="project-thumb">
											<div class="underlay">
												<h4><?php the_title(); ?></h4>

											</div>
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
								</div>
								
							<?php endif; ?>

						<?php endwhile; ?>
						
					</div><!-- .project-group -->

					<div class="project-area"></div><!-- .project-area -->

					<img class="loader" src="<?php echo get_template_directory_uri(); ?>/img/load.gif">
				</div>

			</section><!-- #projects -->
		<?php endif; ?>
		
		<!-- ABOUT -->
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
								<li class="active"><a href="#about">About</a></li>
								<li><a href="#work">Work</a></li>
								<li><a href="#contact">Contact</a></li>
							</ul>
						</div>
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


		<!-- CONTACT -->
		<section id="contact" class="br-cf">
			<?php $id = 11; ?>
			<?php $page = get_page($id); ?>
			<?php $content = $page->post_content; ?>
			<?php $content = apply_filters('the_content', $content); ?>
			
			<div class="topborder">
				<div class="braica-container">
					<div class="right-rail">
						<div class="nav collapsed">
							<ul>
								<li class="active"><a href="#contact">Contact</a></li>
								<li><a href="#work">Work</a></li>
								<li><a href="#about">About</a></li>
							</ul>
						</div>
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

		</section><!-- #contact -->

	</div><!-- #content -->


<?php get_footer(); ?>