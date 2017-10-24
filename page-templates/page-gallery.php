<?php
/**
**	Template Name: Gallery
**/

 get_header(); ?>
<?php $second_editor = get_post_meta($post->ID, WYSIWYG_META_KEY, true);?>

 <?php get_template_part( 'template-parts/page-header' ); ?>

 <div class="" role="main">

 <?php do_action( 'foundationpress_before_content' ); ?>
 <?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>">
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content main-wrap roomy">
			<?php the_content(); ?>
			<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</article>
 <?php endwhile;?>

<section id="blog" class="roomy blue-bleed side-graphic">
	<div class="center">
		<h2 class="far white">Featured Weddings</h2>
	</div>
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<?php
			$args = array( 'posts_per_page' => 3, 'category_name' => 'featured-weddings' );
			$homepage_blog_query = new WP_Query( $args );
			 
			if ( $homepage_blog_query->have_posts() ) :  while ( $homepage_blog_query->have_posts() ) : $homepage_blog_query->the_post(); ?>
				<div class="cell large-4 medium-6 small-12 white-bleed smidge-margin">
					<?php
					if (function_exists('display_featured_media')) {
					    display_featured_media('medium');
					} elseif ( has_post_thumbnail() ){
					   	the_post_thumbnail();
					}else{
						echo 'Please install UT Featured Video Plugin';
					}
					?>
					<div class="all-padding">
			        	<h3 class="close"><a class="" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3><!-- This pulls the title of the post to display -->
			        	<span class="entry-date"><?php echo get_the_date(); ?></span>
			        	<?php the_excerpt(); ?><!-- This pulls the excerpt of the post to display -->
			        	<a class="outline-button-black" href="<?php echo get_permalink(); ?>">View Gallery</a>
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
	</div>
	<div class="center roomy"><a class="outline-button-white large" href="<?php echo get_site_url(); ?>/?post_type=post">Contact Us!</a></div>
</section>
<section id="portfolio" class="">
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x far">
			<?php echo $second_editor; ?>
		</div>
	</div>
</section>
 <?php do_action( 'foundationpress_after_content' ); ?>

 </div>

 <?php get_footer();
