<?php
/**
Template Name: No Gutters
 */

 get_header(); ?>
 <?php get_template_part( 'template-parts/page-header' ); ?>
 <div class="" role="main">
 <?php do_action( 'foundationpress_before_content' ); ?>
 <?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>">
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</article>
 <?php endwhile;?>
 <?php do_action( 'foundationpress_after_content' ); ?>
 </div>
 <?php get_footer();
