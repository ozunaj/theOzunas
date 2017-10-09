<?php
/*
Template Name: Home
*/
get_header(); ?>
<section class="parallax-lights extra-roomy center white">
	<h1 class="fancy headline close">Jared Ozuna</h1>
	<span class="close byline">wordpress web developer</span><br>
	&nbsp;
	<hr class="light">
	<a class="inverse-button-light" href="#">View my Portfolio</a>
</section>
<section id="about">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x">
			<div class="cell">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php 
		endwhile; else: 
	?>
	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</section>
<section id="blog" class="roomy blue-bleed">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell center">
				<h2 class="far white">My Personal Life</h2>
			</div>
			<?php
			$args = array( 
				'posts_per_page' => 3,
				//'category_name'  => 'blog', 
			);
			 
			// Variable to call WP_Query.
			$name_of_query = new WP_Query( $args );
			 
			if ( $name_of_query->have_posts() ) :  while ( $name_of_query->have_posts() ) : $name_of_query->the_post();
				   	//Start the Loop
					// Anything in this loop are will be pulled 3 times for each post that matches the args we set up
				?>
					<div class="cell large-4 medium-6 small-12 white-bleed smidge-margin">
						<?php display_featured_media('medium');?>
						<div class="all-padding">
				        	<h3 class="close"><a class="" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3><!-- This pulls the title of the post to display -->
				        	<span class="entry-date"><?php echo get_the_date(); ?></span>
				        	<?php the_excerpt(); ?><!-- This pulls the excerpt of the post to display -->
				        	<a class="button" href="<?php echo get_permalink(); ?>">Read More</a>
				        </div>
			        </div>
				<?php
			    // End the Loop

			    endwhile;
			else:
			    // If no posts match this query, output this text.
			    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
			endif;
			wp_reset_postdata();
			 
			?>
		</div>
		<div class="cell center roomy">
			<a class="inverse-button-light large" href="#">View All Posts</a>
		</div>
	</div>
</section>
<section class="parallax-computer">
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x">
			<div class="cell center">
				<span class="drop-quote">I not only connect people to your website; <br>
				I connect them to your brand.</span>
			</div>
		</div>
	</div>
</section>
<section id="contact">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x">
			<div class="cell">
				<h2 style="text-align: center;">Let's Connect</h2>
				<?php echo do_shortcode('[formidable id="2"]'); ?>
			</div>
		</div>
	</div>
	<?php 
		endwhile; else: 
	?>
	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</section>

<?php get_footer();
