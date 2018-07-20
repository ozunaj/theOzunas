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

<section class="roomy blue-bleed side-graphic">
	<div class="center">
		<h2 class="white">Featured Weddings</h2>
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
	<div class="center less-roomy"><a class="outline-button-white large" href="<?php echo get_site_url(); ?>/contact">Contact Us!</a></div>
</section>
<section>
	<div class="grid-container roomy">
		<div class="grid-x grid-margin-x far">
			<?php echo $second_editor; ?>
		</div>
	</div>
</section>
 <?php do_action( 'foundationpress_after_content' ); ?>

 </div>

 <?php get_footer();
