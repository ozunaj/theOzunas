<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<footer class="footer-ozuna blue-bleed white">
			<div class="footer-container roomy">
				<div class="grid-container">
					<div class="grid-x grid-margin-x far">
						<?php do_action( 'foundationpress_before_footer' ); ?>
						<?php dynamic_sidebar( 'footer-widgets' ); ?>
						<?php do_action( 'foundationpress_after_footer' ); ?>
						<hr class="close">
					</div>
				</div>
			</div>
			<div class="grid-container">
				<div class="grid-x grid-margin-x">
					<div class="center cell large-12 far">Site Created By Jared Ozuna (2017)</div>
				</div>
			</div>
		</footer>
		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
