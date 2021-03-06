/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @package WordPress
 * @subpackage Painted_Lady
 * @since 1.01
 * @author Chris Baldelomar <chris@webplantmedia.com>
 * @copyright Copyright (c) 2018, Chris Baldelomar
 * @link https://webplantmedia.com/product/painted-lady-wordpress-theme/
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

( function( $ ) {

	function changeMediaQuery( id, value) {
		if ( value === '' ) {
			return;
		}

		var stylesheet = '#painted-lady-style-inline-css';
		var $css       = $( 'head ' + stylesheet );
		if ( $css.length ) {
			var css     = $css.html();
			var regexp  = new RegExp( ':.+?(?=\\))\\)\\s\\{\\s*\\/\\*id:' + id + '\\*\\/', 'g' );
			var replace = ': ' + value + ') { /*id:' + id + '*/';
			css         = css.replace( regexp,replace );
			$css.html( css );
		}
	}

	function changeInlineCSS( id, value) {
		if ( value === '' ) {
			value = 'initial';
		}

		var stylesheet = '#painted-lady-style-inline-css';
		var $css       = $( 'head ' + stylesheet );
		if ( $css.length ) {
			var css     = $css.html();
			var regexp  = new RegExp( ':.+?(?=;);\\s*\\/\\*id:' + id + '\\*\\/', 'g' );
			var replace = ': ' + value + '; /*id:' + id + '*/';
			css         = css.replace( regexp,replace );
			$css.html( css );
		}
	}

	function rem( pixel ) {
		pixel = parseInt( pixel );

		if ( pixel < 1 ) {
			return '';
		}

		var default_font_size = 16;

		var css = '';
		var em  = pixel / default_font_size;

		return em + 'rem';
	}

	// Background color
	wp.customize(
		'background_color', function( value ) {
			value.bind(
				function( to ) {
					if ( ( '#ffffff' == to || '#fff' == to || '' == to ) ) {
						changeInlineCSS( 'background_color', '#ffffff' );
					} else {
						changeInlineCSS( 'background_color', to );
					}
				}
			);
		}
	);

	// Site title and description.
	wp.customize(
		'blogname', function( value ) {
			value.bind(
				function( to ) {
					$( '.site-title a' ).text( to );
				}
			);
		}
	);
	wp.customize(
		'blogdescription', function( value ) {
			value.bind(
				function( to ) {
					$( '.site-description' ).text( to );
				}
			);
		}
	);

	// Colors.
	wp.customize(
		'link_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'link_color', to );
				}
			);
		}
	);
	wp.customize(
		'link_hover_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'link_hover_color', to );
				}
			);
		}
	);
	wp.customize(
		'primary_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'primary_color', to );
				}
			);
		}
	);
	wp.customize(
		'primary_hover_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'primary_hover_color', to );
				}
			);
		}
	);
	wp.customize(
		'footer_background_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'footer_background_color', to );
				}
			);
		}
	);
	wp.customize(
		'archive_background_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'archive_background_color', to );
				}
			);
		}
	);
	wp.customize(
		'404_cover_color', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( '404_cover_color', to );
				}
			);
		}
	);
	wp.customize(
		'404_cover_opacity', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( '404_cover_opacity', ( to / 100 ) );
				}
			);
		}
	);
	wp.customize(
		'thumb_excerpt_max_height', function( value ) {
			value.bind(
				function( to ) {
					var selectors = '#master .excerpt .entry-image';
					if ( to > 0 ) {
						$( selectors ).css(
							{
								'max-height': to + 'px'
							}
						);
					} else {
						$( selectors ).css(
							{
								'max-height': ''
							}
						);
					}
				}
			);
		}
	);
	wp.customize(
		'heading_padding_top', function( value ) {
			value.bind(
				function( to ) {
					var selectors = '.site-branding';
					$( selectors ).css(
						{
							'padding-top': to + 'px'
						}
					);
				}
			);
		}
	);
	wp.customize(
		'heading_padding_bottom', function( value ) {
			value.bind(
				function( to ) {
					var selectors = '.site-branding';
					$( selectors ).css(
						{
							'padding-bottom': to + 'px'
						}
					);
				}
			);
		}
	);
	wp.customize(
		'split_menu_top_offset', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'split_menu_top_offset', to + 'px' );
				}
			);
		}
	);
	wp.customize(
		'split_menu_logo_width', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'split_menu_logo_width', to + 'px' );
				}
			);
		}
	);
	wp.customize(
		'sticky_menu_logo_width', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'sticky_menu_logo_width', to + 'px' );
				}
			);
		}
	);
	wp.customize(
		'split_menu_collapse_width', function( value ) {
			value.bind(
				function( to ) {
					changeMediaQuery( 'split_menu_collapse_width', to + 'px' );
				}
			);
		}
	);
	wp.customize(
		'top_header_background_offset', function( value ) {
			value.bind(
				function( to ) {
					changeInlineCSS( 'top_header_background_offset', 'calc(50% + ' + to + 'px) top' );
					changeInlineCSS( 'top_header_background_offset_1', 'calc(50% + ' + ( to - 25 ) + 'px) top' );
					changeInlineCSS( 'top_header_background_offset_2', 'calc(50% + ' + ( to - 50 ) + 'px) top' );
					changeInlineCSS( 'top_header_background_offset_3', 'calc(50% + ' + ( to - 75 ) + 'px) top' );
				}
			);
		}
	);
	wp.customize(
		'read_more_label', function( value ) {
			value.bind(
				function( to ) {
					$( '.menu-label' ).text( to );
				}
			);
		}
	);
} )( jQuery );
