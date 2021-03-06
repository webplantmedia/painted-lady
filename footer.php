<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress
 * @subpackage Painted_Lady
 * @since 1.01
 * @author Chris Baldelomar <chris@webplantmedia.com>
 * @copyright Copyright (c) 2018, Chris Baldelomar
 * @link https://webplantmedia.com/product/painted-lady-wordpress-theme/
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

$footer_1           = is_active_sidebar( 'footer-1' );
$footer_2           = is_active_sidebar( 'footer-2' );
$footer_3           = is_active_sidebar( 'footer-3' );
$has_footer_widgets = false;

if ( $footer_1 || $footer_2 || $footer_3 ) {
	$has_footer_widgets = true;
}

$column = 1;
?>

		</div><!-- .site-content-inner -->
	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'gallery-1' ) ) : ?>

		<div id="footer-gallery" class="footer-gallery-widget-wrapper">

			<?php dynamic_sidebar( 'gallery-1' ); ?>

		</div>

	<?php endif; ?>

	<?php if ( $has_footer_widgets ) : ?>

		<footer id="colophon" class="site-footer has-footer-widgets">

			<div class="site-boundary">

				<aside id="tertiary" class="footer-widget-area">

					<div class="footer-container">

						<div class="footer-column footer-column-<?php echo esc_attr( $column ); ?>">
							<?php if ( $footer_1 ) : ?>
								<?php dynamic_sidebar( 'footer-1' ); ?>
							<?php endif; ?>
						</div>
						<?php $column++; ?>

						<div class="footer-column footer-column-<?php echo esc_attr( $column ); ?>">
							<?php if ( $footer_2 ) : ?>
								<?php dynamic_sidebar( 'footer-2' ); ?>
							<?php endif; ?>
						</div>
						<?php $column++; ?>

						<div class="footer-column footer-column-<?php echo esc_attr( $column ); ?>">
							<?php if ( $footer_3 ) : ?>
								<?php dynamic_sidebar( 'footer-3' ); ?>
							<?php endif; ?>
						</div>

					</div>

				</aside><!-- #tertiary -->

			</div><!-- .site-boundary -->

	<?php else : ?>

		<footer id="colophon" class="site-footer">

	<?php endif; ?>

			<div class="site-info-wrapper">
				<div class="site-boundary">
					<div class="site-info">
						<?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
							<?php dynamic_sidebar( 'footer-bottom' ); ?>
						<?php else : ?>
							<p><?php printf( esc_html__( 'Site crafted with', 'painted-lady' ) . ' <i class="genericons-neue genericons-neue-heart"></i> ' . esc_html__( 'by', 'painted-lady' ) . ' <a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a>' ); ?></p>
						<?php endif; ?>
					</div><!-- .site-info -->
				</div><!-- .site-boundary -->
			</div><!-- .site-info-wrapper -->

		</footer><!-- #colophon -->

</div><!-- #page -->

<div id="mobile-navigation" class="main-navigation mobile-menu">

	<?php get_template_part( 'template-parts/menu', 'mobile' ); ?>

</div><!-- .#mobile-navigation -->

<?php wp_footer(); ?>

</body>
</html>
