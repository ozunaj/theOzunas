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
<section class="roomy">
	<div class="grid-x center">
		<h2 class="far cell">what i do</h2>
	</div>
	<div class="grid-container">
		<div class="grid-x grid-margin-x grid-padding-x">
			<div class="cell small-12 medium-6 large-6">
				<div class="flex-video widescreen">
					<iframe width="auto" height="auto" src="https://www.youtube.com/embed/0SUajL4SFvs" frameborder="0" allowfullscreen></iframe>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consectetur lacus varius diam auctor, a auctor tortor vulputate. Nullam varius, tortor vel sagittis ultrices, purus felis lacinia leo, vitae convallis arcu ligula eu nisi. Quisque hendrerit finibus felis vel blandit. Vivamus luctus, tortor imperdiet finibus placerat, metus urna sodales lacus, a pulvinar sem dui eu urna. Nulla facilisi. Phasellus ligula magna, rutrum ac aliquet eget, vulputate at purus.</p>
			</div>
			<div class="cell small-12 medium-6 large-6">
				<div class="grid-x far">
					<div class="cell large-2 icon-container">
						<span class="typcn typcn-device-laptop mega-icon dark-blue"></span>
					</div>
					<div class="cell large-10">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consectetur lacus varius diam auctor, a auctor tortor vulputate.</p>
					</div>
				</div>
				<div class="grid-x far">
					<div class="cell large-2 icon-container">
						<span class="typcn typcn-news mega-icon dark-blue"></span>
					</div>
					<div class="cell large-10">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consectetur lacus varius diam auctor, a auctor tortor vulputate.</p>
					</div>
				</div>
				<div class="grid-x far">
					<div class="cell large-2 icon-container">
						<span class="typcn typcn-device-phone mega-icon dark-blue"></span>
					</div>
					<div class="cell large-10">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consectetur lacus varius diam auctor, a auctor tortor vulputate.</p>
					</div>
				</div>
				<div class="grid-x far">
					<div class="cell large-2 icon-container">
						<span class="typcn typcn-chart-pie mega-icon dark-blue"></span>
					</div>
					<div class="cell large-10">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce consectetur lacus varius diam auctor, a auctor tortor vulputate.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="roomy blue-bleed">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell center">
				<h2 class="far white">my personal life</h2>
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
						<?php the_post_thumbnail('medium', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>
						<div class="all-padding">
				        	<h3 class="close"><?php the_title(); ?></h3><!-- This pulls the title of the post to display -->
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
				<span class="drop-quote">We not only connect people to your website; <br>
				We connect them to your brand.</span>
			</div>
		</div>
	</div>
</section>
<section>
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

<?php get_footer();
