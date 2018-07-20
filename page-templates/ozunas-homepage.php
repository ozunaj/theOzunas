<?php
/*
Template Name: the Ozunas Homepage
*/
get_header(); ?>
<?php $second_editor = get_post_meta($post->ID, WYSIWYG_META_KEY, true);?>
<?php $slideshow_shortcode = get_post_meta( get_the_ID(), 'slideshow-shortcode', true ); ?>

<section class="roomy">
	<?php echo do_shortcode($slideshow_shortcode); ?>
</section>
<section id="about">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x">
			<?php the_content(); ?>
		</div>
	</div>
	<?php 
		endwhile; else: 
	?>
	<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</section>
<section class="roomy blue-bleed side-graphic">
	<div class="center">
		<h2 class="far white">Featured Weddings</h2>
	</div>
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<?php
			$args = array( 'posts_per_page' => 3, 'category_name' => 'featured-weddings' );
			$homepage_blog_query = new WP_Query( $args );
			 
			if ( $homepage_blog_query->have_posts() ) :  while ( $homepage_blog_query->have_posts() ) : $homepage_blog_query->the_post(); ?>
				 <?php get_template_part( 'template-parts/blog-card' ); ?>

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
	</div>
	<div class="center roomy"><a class="outline-button-white large" href="<?php echo get_site_url(); ?>/?post_type=post">View All Posts</a></div>
</section>
<section class="parallax-quote">
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x">
			<div class="cell center">
				<span class="drop-quote">"Working with Jared and Rebecca was one of the most rewarding experiences I’ve had during our wedding preparation process." - Emily</span>
			</div>
		</div>
	</div>
</section>
<section id="portfolio" class="">
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x far">
			<?php echo $second_editor; ?>
		</div>
	</div>
</section>

<?php get_footer();
