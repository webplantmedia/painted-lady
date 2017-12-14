<?php
// Store user defined options
$crimson_rose = array();
// Store default options;
$crimson_rose_default = array();

// Title & Tagline
$crimson_rose_default['custom_logo_2x'] = '';
$crimson_rose_default['heading_padding_top'] = '50';
$crimson_rose_default['heading_padding_bottom'] = '70';

// Colors
$crimson_rose_default['header_background_image_color'] = 'dark-green';
$crimson_rose_default['primary_color'] = '#3a8323';
$crimson_rose_default['primary_hover_color'] = '#f6a378';
$crimson_rose_default['archive_background_color'] = '#eef3ec';
$crimson_rose_default['archive_title_light'] = 0;
$crimson_rose_default['footer_background_color'] = '#f8faf7';
$crimson_rose_default['footer_background_image_color'] = 'dark-green';
$crimson_rose_default['link_color'] = '#666666';
$crimson_rose_default['link_hover_color'] = '#f6874d';

/*
 * Theme Options
 */

// Top header
$crimson_rose_default['top_header_background_offset'] = 460;

// Menu
$crimson_rose_default['show_menu_arrows'] = 1;

// Site
$crimson_rose_default['default_button_style'] = 'button-2';
$crimson_rose_default['disable_google_fonts'] = 0;
$crimson_rose_default['disable_custom_fonts'] = 0;
$crimson_rose_default['page_image_header_height'] = 400;
$crimson_rose_default['check_for_updates'] = 1;
$crimson_rose_default['footer_image_bottom_offset'] = 30;

// Blog
$crimson_rose_default['blog_display'] = 'blog1';
$crimson_rose_default['archive_display'] = 'blog1';
$crimson_rose_default['search_display'] = 'blog2';
$crimson_rose_default['thumb_excerpt_max_height'] = 0;
$crimson_rose_default['thumb_grid_max_height'] = 0;
$crimson_rose_default['blog_single_hide_post_navigation'] = 0;
$crimson_rose_default['jetpack_hide_share_count'] = 0;

// Shop
$crimson_rose_default['shop_columns'] = 2;
$crimson_rose_default['shop_archive_columns'] = 3;
$crimson_rose_default['shop_related_products_columns'] = 2;
$crimson_rose_default['shop_image_backdrop'] = 1;
$crimson_rose_default['shop_hide_breadcrumbs'] = 0;
$crimson_rose_default['shop_hide_stars'] = 0;
$crimson_rose_default['shop_hide_result_count'] = 0;
$crimson_rose_default['shop_hide_catalog_ordering'] = 0;
$crimson_rose_default['shop_product_hide_stars'] = 0;
$crimson_rose_default['shop_product_hide_meta'] = 0;
$crimson_rose_default['shop_disable_gallery_zoom'] = 0;
$crimson_rose_default['shop_disable_gallery_lightbox'] = 0;
$crimson_rose_default['shop_disable_gallery_slider'] = 0;
$crimson_rose_default['shop_truncate_titles'] = 1;
$crimson_rose_default['shop_product_page_template'] = 'grid-accordion';

// Display Sidebar
$crimson_rose_default['display_sidebar_blog'] = 1;
$crimson_rose_default['display_sidebar_post'] = 1;
$crimson_rose_default['display_sidebar_shop'] = 0;
$crimson_rose_default['display_sidebar_archive'] = 1;
$crimson_rose_default['display_sidebar_search'] = 0;
$crimson_rose_default['display_sidebar_shop_archive'] = 0;

// Footer
$crimson_rose_default['site_info'] = 'Site made with <i class="genericons-neue genericons-neue-heart"></i> by <a href="https://angiemakes.com/">Angie Makes</a>';

// Labels
$crimson_rose_default['mobile_menu_label'] = 'Menu';
$crimson_rose_default['read_more_label'] = 'Continue Reading';

/**
 * Set default options
 *
 * wp_loaded gets called before template_redirect, so we can safely set
 * a custom $content_width.
 *
 * Also, if we call get_theme_mod any sooner, then we can't live preview.
 */
function crimson_rose_default_options() {
	global $crimson_rose_default;
	global $crimson_rose;

	foreach ( $crimson_rose_default as $key => $value ) {
		$crimson_rose[ $key ] = get_theme_mod( $key, $value );
	}
}
add_action( 'wp_loaded', 'crimson_rose_default_options' );
