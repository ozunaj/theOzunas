<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css?family=Pacifico|Quicksand" rel="stylesheet">
		<link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/src/assets/fonts/typicons.font/src/font/typicons.min.css" />
		<?php wp_head(); ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101770605-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-101770605-1');
		</script>
		<!-- End Of Analytics -->
	</head>
	<body <?php body_class(); ?>>
		<script type="text/javascript">
			$(window).scroll(function() {    
			    var scroll = $(window).scrollTop();

			    if (scroll >= 10) {
			        $(".logo").addClass("small-logo");
			        $(".top-bar-right").addClass("no-margin");
			    } else {
			        $(".logo").removeClass("small-logo");
			        $(".top-bar-right").removeClass("no-margin");
			    }
			});
		</script>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header class="site-header docs-sticky-top-bar" role="banner" data-sticky-container>
		<div data-sticky data-options="marginTop:0;" style="width:100%">
			<div class="mobile-logo show-for-small-only center"><a href="<?php echo get_option('home'); ?>"/><img src='<?php jmo_display_logo(); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a></div>
			<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?>>
				<div class="title-bar-left">
					<button class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
					<span class="site-mobile-title title-bar-title"> Menu </span>
				</div>
			</div>
			<nav class="site-navigation top-bar" role="navigation">
				<div class="top-bar-left">
					<div class="site-desktop-title top-bar-title">
						<a href="<?php echo get_option('home'); ?>"/><img class="large-offset-3 logo" src='<?php jmo_display_logo(); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
					</div>
				</div>
				<div class="top-bar-right">
					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
