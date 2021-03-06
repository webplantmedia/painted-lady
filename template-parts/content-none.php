<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Painted_Lady
 * @since 1.01
 * @author Chris Baldelomar <chris@webplantmedia.com>
 * @copyright Copyright (c) 2018, Chris Baldelomar
 * @link https://webplantmedia.com/product/painted-lady-wordpress-theme/
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'painted-lady' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
		?>

			<p>
			<?php
				printf(
					/* translators: link to WP admin new post page. */
					esc_html__( 'Ready to publish your first post? %s.', 'painted-lady' ),
					'<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">' . esc_html__( 'Get started here', 'painted-lady' ) . '</a>'
				);
			?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'painted-lady' ); ?></p>
			<?php
				get_search_form();

		else :
		?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'painted-lady' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
