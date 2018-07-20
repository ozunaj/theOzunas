<?php
/**
 * Blog Cards
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="box-shaddow cell large-4 medium-6 small-12 white-bleed smidge-margin">
	<?php
	if (function_exists('display_featured_media')) {
	    display_featured_media('medium');
	} elseif ( has_post_thumbnail() ){
	   	the_post_thumbnail('medium');
	}else{
		echo 'Please install UT Featured Video Plugin';
	}
	?>
	<div class="all-padding">
    	<h3 class="close"><a class="" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3><!-- This pulls the title of the post to display -->
    	<span class="entry-date"><?php echo get_the_date(); ?></span><br>
    	<?php the_excerpt(); ?><!-- This pulls the excerpt of the post to display -->
    	<a class="outline-button-black" href="<?php echo get_permalink(); ?>">View Gallery</a>
    </div>
</div>
