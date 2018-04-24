<?php
/**
 * Gutenberg theme support.
 *
 * @package     Crimson_Rose
 * @license     GPL-3.0
 */

/**
 * Advanced Gutenberg block features that require opt-in support in the theme.
 *
 * @see http://gutenberg-devdoc.surge.sh/reference/theme-support/
 */
function crimson_rose_gutenberg_supported_features() {

	/**
	 * Custom colors for use in the editor.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
	 */
	/* add_theme_support(
		'editor-color-palette',
		array(
			'#2a2a2a',
			'#3a3a3a',
			'#727477',
			'#aaaaaa',
		)
	); */
	// Add support for full width images and other content such as videos.
	add_theme_support( 'align-wide' );

}
add_action( 'after_setup_theme', 'crimson_rose_gutenberg_supported_features' );

/**
 * Enqueue theme styles within Gutenberg.
 */
function crimson_rose_gutenberg_styles() {

	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'crimson-rose-gutenberg', get_template_directory_uri() . '/css/admin/gutenberg.css', array(), CRIMSON_ROSE_VERSION, 'all' );

	// Add custom fonts to Gutenberg.
	wp_enqueue_style( 'crimson-rose-body-font', get_parent_theme_file_uri() . '/fonts/lato/stylesheet.css', array(), CRIMSON_ROSE_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'crimson_rose_gutenberg_styles' );
