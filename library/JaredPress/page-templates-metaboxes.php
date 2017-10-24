<?php
/**
 * Page Templates Metaboxes
 *
 * @package FoundationPress
 * @since FoundationPress 1.1
 */

 //Custom Functions by Jared Ozuna
 //Controls - (User Control), Settings - (Database selection), Sections - (Group of Options)
 
 //Import admin stylesheet first
 function mytheme_add_init() {
    $file_dir=get_bloginfo('template_directory');
    wp_enqueue_style("functions", $file_dir."/assets/stylesheets/admin_styles.css", false, "1.0", "all");
}
 add_action( 'admin_print_styles', 'mytheme_add_init' );
 //Done with Styles
 

 /**
 * Register meta box(es).
 */
 
 function salud_register_subhead_metabox() 
 {
    global $post;
    $post_type = array('page', 'toolkit');

    if(!empty($post))
    {
        add_meta_box( 
        'meta-id',
        __( 'Page Banner Text', 'textdomain' ),
        'salud_subhead_meta_callback',
        $post_type, 
        'normal' 
        );
    }
}
add_action( 'add_meta_boxes', 'salud_register_subhead_metabox' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function salud_subhead_meta_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    wp_nonce_field( basename( __FILE__ ), 'utPress_nonce' );
    $salud_subheader_text = get_post_meta( $post->ID );
    ?>
    <p>
        <label for="subheader-text" class=""><?php _e( 'The text you type below will apear in the page header under the page title', 'salud-textdomain' )?></label><br>
        <br>
        <textarea cols="100" rows="2" name="subheader-text" id="subheader-text"><?php if ( isset ( $salud_subheader_text['subheader-text'] ) ) echo $salud_subheader_text['subheader-text'][0]; ?></textarea>
    </p>
    <p>
        <label for="subheader-button-text" class=""><?php _e( 'Button Text', 'salud-textdomain' )?></label><br>
        <textarea cols="100" rows="1" limit="20" name="subheader-button-text" id="subheader-button-text"><?php if ( isset ( $salud_subheader_text['subheader-button-text'] ) ) echo $salud_subheader_text['subheader-button-text'][0]; ?></textarea>
    </p>
    <p>
        <label for="subheader-button-url" class=""><?php _e( 'Button URL', 'salud-textdomain' )?></label>
        <br>
        <textarea cols="100" rows="1" name="subheader-button-url" id="subheader-button-url"><?php if ( isset ( $salud_subheader_text['subheader-button-url'] ) ) echo $salud_subheader_text['subheader-button-url'][0]; ?></textarea>
    </p>
    <?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function utPress_save_meta_box( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'utPress_nonce' ] ) && wp_verify_nonce( $_POST[ 'utPress_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    if ( isset( $_POST[ 'subheader-text' ] ) ) {
        update_post_meta( $post_id, 'subheader-text', sanitize_text_field( $_POST[ 'subheader-text' ] ) );
    }
    if ( isset( $_POST[ 'subheader-button-text' ] ) ) {
        update_post_meta( $post_id, 'subheader-button-text', sanitize_text_field( $_POST[ 'subheader-button-text' ] ) );
    }
    if ( isset( $_POST[ 'subheader-button-url' ] ) ) {
        update_post_meta( $post_id, 'subheader-button-url', sanitize_text_field( $_POST[ 'subheader-button-url' ] ) );
    }
}
add_action( 'save_post', 'utPress_save_meta_box' );

/**END OF CUSTOM META BOX FOR featured-page-featured-image **/

/** 

Calling the meta from a template. Declare a new variable to be used in this page and have it grab the info from the database meta key. 

 $meta_subheader = get_post_meta( get_the_ID(), 'subheader-text', true );

Next, echo if it isnt empty

if( !empty( $meta_subheader ) ) {
    echo '<span class="">' . $meta_subheader, '</span><br>';
}

**/

/**
*
*
* The top is 1 clean meta for text. I am leaving it seperated from the bottom meta to be re-used in future metabox needs..... - JMO
*
*
**/
 
 function salud_register_twitter_metabox() 
{
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-templates/news.php' || $pageTemplate == 'page-templates/tweetchat-landing.php' )
        {
        add_meta_box( 
        'twitter-meta',
        __( 'Tweetchat Event Information', 'textdomain' ),
        'salud_twitter_meta_callback',
        'page', 
        'normal' 
        );
        }
    }
}
add_action( 'add_meta_boxes', 'salud_register_twitter_metabox' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function salud_twitter_meta_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    wp_nonce_field( basename( __FILE__ ), 'utPress_nonce' );
    $salud_twitter_meta = get_post_meta( $post->ID );
    ?>
    <span>To get rid of the text below, delete the following boxes and update the post.</span>
    <p>
        <label for="twitter-text" class=""><?php _e( '<b>Tweetchat Title:</b>', 'salud-textdomain' )?></label><br>
        <br>
        <textarea cols="100" rows="2" name="twitter-text" id="twitter-text"><?php if ( isset ( $salud_twitter_meta['twitter-text'] ) ) echo $salud_twitter_meta['twitter-text'][0]; ?></textarea>
    </p>
    <p>
        <label for="twitter-date" class=""><?php _e( '<b>Tweetchat Date:</b>', 'salud-textdomain' )?></label><br>
        <br>
        <textarea cols="100" rows="2" name="twitter-date" id="twitter-text"><?php if ( isset ( $salud_twitter_meta['twitter-date'] ) ) echo $salud_twitter_meta['twitter-date'][0]; ?></textarea>
    </p>
        <p>
        <label for="twitter-url" class=""><?php _e( '<b>Tweetchat URL:</b>', 'salud-textdomain' )?></label><br>
        <br>
        <textarea cols="100" rows="2" name="twitter-url" id="twitter-text"><?php if ( isset ( $salud_twitter_meta['twitter-url'] ) ) echo $salud_twitter_meta['twitter-url'][0]; ?></textarea>
    </p>
    <?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function salud_save_twitter_meta( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'utPress_nonce' ] ) && wp_verify_nonce( $_POST[ 'utPress_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    if ( isset( $_POST[ 'twitter-text' ] ) ) {
        update_post_meta( $post_id, 'twitter-text', sanitize_text_field( $_POST[ 'twitter-text' ] ) );
    }
    if ( isset( $_POST[ 'twitter-date' ] ) ) {
        update_post_meta( $post_id, 'twitter-date', sanitize_text_field( $_POST[ 'twitter-date' ] ) );
    }
    if ( isset( $_POST[ 'twitter-url' ] ) ) {
        update_post_meta( $post_id, 'twitter-url', sanitize_text_field( $_POST[ 'twitter-url' ] ) );
    }
}
add_action( 'save_post', 'salud_save_twitter_meta' );

/**END OF CUSTOM META BOX FOR featured-page-featured-image **/

/** 

Calling the meta from a template. Declare a new variable to be used in this page and have it grab the info from the database meta key. 

 $salud_twitter_meta = get_post_meta( get_the_ID(), 'subheader-text', true );

Next, echo if it isnt empty

if( !empty( $salud_twitter_meta ) ) {
    echo '<span class="">' . $meta_subheader, '</span><br>';
}

**/

