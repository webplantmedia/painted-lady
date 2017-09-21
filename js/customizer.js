/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Colors
	wp.customize( 'text_color', function( value ) {
		value.bind( function( to ) {
			var selectors = '.main-navigation a, .menu-toggle, body, button, input, select, optgroup, textarea';
			$(selectors).css( {
				'color': to
			} );
		} );
	} );
	wp.customize( 'link_color', function( value ) {
		value.bind( function( to ) {
			var selectors = 'a:visited, a:focus, a:active, a';
			$(selectors).css( {
				'color': to
			} );
		} );
	} );
	wp.customize( 'link_hover_color', function( value ) {
		value.bind( function( to ) {
			var selectors = 'a:hover';
			$(selectors).css( {
				'color': to
			} );
		} );
	} );
} )( jQuery );
