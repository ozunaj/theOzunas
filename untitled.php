<?php
// Args will define what content is going to be pulled from the WP database and used in the loop
// This example argument defines three posts per page.
// The second arg says to only pull posts that are tagged with the blog category name
$args = array( 
	'posts_per_page' => 3,
	'category_name'  => 'blog', 
);
 
// Variable to call WP_Query.
$name_of_query = new WP_Query( $args );
 
if ( $name_of_query->have_posts() ) :  while ( $name_of_query->have_posts() ) : $name_of_query->the_post();

   	//Start the Loop
		// Anything in this loop are will be pulled 3 times for each post that matches the args we set up
        
        the_title();
        the_excerpt();

    // End the Loop

    endwhile;
else:
    // If no posts match this query, output this text.
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
wp_reset_postdata();
 
?>