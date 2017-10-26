<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<section class="banner-image-container blue-bleed align-middle">
  <div style="background: linear-gradient(rgba(68,118,132,.7),rgba(68,118,132,.7)), url('<?php echo get_template_directory_uri();?>/src/assets/images/core/blog-rings.jpg'); background-position: center;" class="full-width-image white roomy">
    <div class="grid-container grid-container-padded">
      <div class="grid-x grid-margin-x banner-size align-middle">
        <div class="cell large-12">
          <h1 class="extra-large white fancy center close"><?php single_cat_title(''); ?></h1><br>
             <h3 class="center white">Check out our latest work</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<article class="bleed side-graphic">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
					 <?php get_template_part( 'template-parts/blog-card' ); ?>
			<?php endwhile; ?>

			<?php else : ?>
					 <?php get_template_part( 'template-parts/blog-card', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php
			if ( function_exists( 'foundationpress_pagination' ) ) :
				foundationpress_pagination();
			elseif ( is_paged() ) :
			?>
				<nav id="post-nav">
					<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
					<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</article>

	<?php //get_sidebar(); ?>

</div>

<?php get_footer();
