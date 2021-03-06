<?php
/**
 * Template part for displaying posts
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

<?php if ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div class="lead-post">
		<?php get_template_part( 'template-parts/excerpt', painted_lady_get_page_template_in_loop() ); ?>
	</div>
<?php endif; ?>

<?php if ( have_posts() ) : ?>
	<div class="grid"><!-- No White Space
		<?php

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
		?>

			--><div class="grid__col grid__col--1-of-2">

				<?php get_template_part( 'template-parts/excerpt2', painted_lady_get_page_template_in_loop() ); ?>

			</div><!-- No White Space

		<?php endwhile; ?>
	--></div>
<?php endif; ?>
