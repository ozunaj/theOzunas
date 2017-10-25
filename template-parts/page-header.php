<?php
/**
 * The default template for displaying the stay current information
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


$meta_subheader = get_post_meta( get_the_ID(), 'subheader-text', true );
$subheader_button_text = get_post_meta( get_the_ID(), 'subheader-button-text', true );
$subheader_button_url = get_post_meta( get_the_ID(), 'subheader-button-url', true );
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
?>
<section class="banner-image-container blue-bleed align-middle">
  <div style="background: linear-gradient(rgba(68,118,132,.7),rgba(68,118,132,.7)), url('<?php echo $thumb['0'];?>'); background-position: center;" class="full-width-image white roomy">
    <div class="grid-container grid-container-padded">
      <div class="grid-x grid-margin-x banner-size align-middle">
        <div class="cell large-12">
          <h1 class="extra-large white fancy center close"><?php the_title(); ?></h1>
          <?php 
          if( !empty( $meta_subheader ) ) {
              echo '<h3 class="center white">' . $meta_subheader, '</h3>';
          } 
          if( !empty( $subheader_button_text ) ) {
             echo '<div class="center"><a class="outline-button-white" href="' . $subheader_button_url . '">' . $subheader_button_text, '</a></div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
