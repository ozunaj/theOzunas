<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php //get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header class="far">
			<h1 class="entry-title close"><?php the_title(); ?></h1>
			<?php //display_featured_media('full');?>
			<span class="entry-date"><?php echo get_the_date(); ?></span>
			<?php //foundationpress_entry_meta(); ?>
		</header>
		<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<p><?php //the_tags(); ?></p>
		</footer>
		<?php //the_post_navigation(); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<section class="roomy blue-bleed side-graphic">
	<div class="center">
		<h2 class="white">View Other Featured Weddings</h2>
	</div>
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<?php
			$args = array( 'posts_per_page' => 3, 'category_name' => 'featured-weddings', 'post__not_in' => array( get_the_ID() ), );
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
	<div class="grid-container">
		<div class="grid-x grid-margin-x align-center-middle center">
			<div class="large-8 cell white">
				<hr class="white">
				<h3>Ready to Work Together?</h3>
				<a class="outline-button-white large" href="<?php echo get_site_url(); ?>/weddings/contact">Contact Us</a>
			</div>
		</div>
	</div>
</section>
<section class="main-wrap">
		<?php do_action( 'foundationpress_post_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_post_after_comments' ); ?>
</section>
<?php get_footer();
