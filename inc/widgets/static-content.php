<?php
/**
 * Section: Static Content Widget
 *
 * @since Angie_Makes_Design 1.0.0.
 *
 * @package Angie_Makes_Design
 */

if ( ! class_exists( 'Angie_Makes_Design_Widget_Static_Content' ) ) :
	/**
	 * Display static content from an specific page.
	 *
	 * @since Angie_Makes_Design 1.0.0.
	 *
	 * @package Angie_Makes_Design
	 */
	class Angie_Makes_Design_Widget_Static_Content extends Angie_Makes_Design_Widget {
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->widget_id          = 'angie-makes-design-static-content';
			$this->widget_cssclass    = 'angie-makes-design-static-content';
			$this->widget_description = esc_html__( 'Displays content from a specific page.', 'angie-makes-design' );
			$this->widget_name        = esc_html__( 'Angie Makes Design: Static Content', 'angie-makes-design' );
			$this->settings           = array(
				'title' => array(
					'type'  => 'text',
					'std'   => '',
					'label' => esc_html__( 'Title:', 'angie-makes-design' ),
					'sanitize' => 'text',
				),
				'page' => array(
					'type'  => 'page',
					'std'   => '',
					'label' => esc_html__( 'Select Page:', 'angie-makes-design' ),
					'sanitize' => 'text',
				),
				'background_image' => array(
					'type'  => 'image',
					'std'   => null,
					'label' => esc_html__( 'Background Image:', 'angie-makes-design' ),
					'sanitize' => 'url',
				),
				'background_color' => array(
					'type'  => 'colorpicker',
					'std'   => '',
					'label' => esc_html__( 'Background Color:', 'angie-makes-design' ),
					'sanitize' => 'color',
				),
				'background_opacity' => array(
					'type'  => 'number',
					'std'   => '100',
					'step'  => '10',
					'min'   => '10',
					'max'   => '100',
					'label' => esc_html__( 'Background Color Opacity:', 'angie-makes-design' ),
					'sanitize' => 'absint',
				),
				'text_color' => array(
					'type'  => 'colorpicker',
					'std'   => '',
					'label' => esc_html__( 'Text Color:', 'angie-makes-design' ),
					'sanitize' => 'color',
				),
				'link_color' => array(
					'type'  => 'colorpicker',
					'std'   => '',
					'label' => esc_html__( 'Link Color:', 'angie-makes-design' ),
					'sanitize' => 'color',
				),
				'padding_top' => array(
					'type'  => 'number',
					'std'   => 80,
					'step'  => 1,
					'min'   => 0,
					'max'   => 300,
					'label' => esc_html__( 'Top padding of widget:', 'angie-makes-design' ),
					'sanitize' => 'number',
				),
				'padding_bottom' => array(
					'type'  => 'number',
					'std'   => 80,
					'step'  => 1,
					'min'   => 0,
					'max'   => 300,
					'label' => esc_html__( 'Bottom padding of widget:', 'angie-makes-design' ),
					'sanitize' => 'number',
				),
				'margin_bottom' => array(
					'type'  => 'number',
					'std'   => 40,
					'step'  => 1,
					'min'   => 0,
					'max'   => 300,
					'label' => esc_html__( 'Bottom margin of widget:', 'angie-makes-design' ),
					'sanitize' => 'number',
				),
			);

			parent::__construct();
		}

		/**
		 * Widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $args
		 * @param array $instance
		 * @return void
		 */
		function widget( $args, $instance ) {
			$o = $this->sanitize( $instance );

			extract( $args );

			$post = new WP_Query( array( 'page_id' => $o['page'] ) );

			$style = array();
			$bg_style = array();
			$fullwidth = false;
			$classes[] = 'static-page-content';
			$classes[] = 'no-top-bottom-margins';
			
			if ( ! empty( $o['padding_top'] ) ) {
				$style[] = 'padding-top:' . $o['padding_top'] . 'px;';
			}

			if ( ! empty( $o['padding_bottom'] ) ) {
				$style[] = 'padding-bottom:' . $o['padding_bottom'] . 'px;';
			}

			if ( ! empty( $o['margin_bottom'] ) ) {
				$style[] = 'margin-bottom:' . $o['margin_bottom'] . 'px;';
			}

			if ( '' !== $o['background_image'] ) {
				$bg_style[] = 'background-image:url(' . esc_url( $o['background_image'] ) . ');';
				$fullwidth = true;
			}

			if ( ! empty( $o['background_color'] ) ) {
				$rgb = $this->hex2rgb( $o['background_color'] );
				$opacity = absint( $o['background_opacity'] ) / 100;
				$fullwidth = true;
			}

			// Allow site-wide customization of the 'Read more' link text.
			$read_more = apply_filters( 'angie_makes_design_read_more_text', esc_html__( 'Read more', 'angie-makes-design' ) );

			if ( $fullwidth ) {
				$before_widget = str_replace( 'class="content-widget', 'class="content-widget full-width-bar', $before_widget );
			}

			echo  $before_widget;
			?>

			<style type="text/css">
				<?php if ( ! empty( $o['background_color'] ) ) : ?>
				#<?php echo esc_html( $this->id ) ?> .static-page-content {
					background-color: rgb(<?php echo $rgb['red']; ?>,<?php echo $rgb['green']; ?>,<?php echo $rgb['blue']; ?>);
					background-color: rgba(<?php echo $rgb['red']; ?>,<?php echo $rgb['green']; ?>,<?php echo $rgb['blue']; ?>,<?php echo $opacity; ?>);
				}
				<?php endif; ?>
				<?php if ( ! empty( $o['link_color'] ) ) : ?>
				#<?php echo esc_html( $this->id ) ?> .entry-content a:not(.theme-generated-button):active,
				#<?php echo esc_html( $this->id ) ?> .entry-content a:not(.theme-generated-button):focus,
				#<?php echo esc_html( $this->id ) ?> .entry-content a:not(.theme-generated-button):visited,
				#<?php echo esc_html( $this->id ) ?> .entry-content a:not(.theme-generated-button):hover,
				#<?php echo esc_html( $this->id ) ?> .entry-content a:not(.theme-generated-button) {
					color: <?php echo esc_html( $o['link_color'] ); ?>;
				}
				<?php endif; ?>
				<?php if ( ! empty( $o['text_color'] ) ) : ?>
				#<?php echo esc_html( $this->id ) ?> .entry-footer a,
				#<?php echo esc_html( $this->id ) ?> .entry-footer a:hover,
				#<?php echo esc_html( $this->id ) ?> .entry-footer a:visited,
				#<?php echo esc_html( $this->id ) ?> .entry-footer a:focus,
				#<?php echo esc_html( $this->id ) ?> .entry-footer a:active,
				#<?php echo esc_html( $this->id ) ?> .entry-content h1,
				#<?php echo esc_html( $this->id ) ?> .entry-content h2,
				#<?php echo esc_html( $this->id ) ?> .entry-content h3,
				#<?php echo esc_html( $this->id ) ?> .entry-content h4,
				#<?php echo esc_html( $this->id ) ?> .entry-content h5,
				#<?php echo esc_html( $this->id ) ?> .entry-content h6,
				#<?php echo esc_html( $this->id ) ?> .entry-content p,
				#<?php echo esc_html( $this->id ) ?> .entry-content,
				#<?php echo esc_html( $this->id ) ?> .widget-title {
					color: <?php echo esc_html( $o['text_color'] ); ?>;
				}
				<?php endif; ?>
			</style>

			<?php if ( ! empty( $bg_style ) ) : ?>
			<div class="bg-image-cover" style="<?php echo implode( '', $bg_style ); ?>">
			<?php endif; ?>

				<div class="<?php echo implode( ' ', $classes ); ?>" style="<?php echo implode( '', $style ); ?>">

					<?php if ( $fullwidth ) : ?>
						<div class="site-boundary">
					<?php endif; ?>

						<?php if ( $post->have_posts() ) : ?>
							<?php while ( $post->have_posts() ) : $post->the_post(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php if ( $o['title'] ) echo  $before_title . $o['title'] . $after_title; ?>

									<div class="entry-content">
										<?php the_content( $read_more ); ?>
									</div>

									<?php if ( get_edit_post_link() ) : ?>
										<footer class="entry-footer">
											<?php
												edit_post_link(
													sprintf(
														wp_kses(
															/* translators: %s: Name of current post. Only visible to screen readers */
															__( 'Edit <span class="screen-reader-text">%s</span>', 'angie-makes-design' ),
															array(
																'span' => array(
																	'class' => array(),
																),
															)
														),
														get_the_title()
													),
													'<span class="edit-link">',
													'</span>'
												);
											?>
										</footer><!-- .entry-footer -->
									<?php endif; ?>
								</article>
							<?php endwhile; ?>
						<?php endif; ?>

					<?php if ( $fullwidth ) : ?>
						</div><!-- .site-boundary -->
					<?php endif; ?>

				</div>

			<?php if ( ! empty( $bg_style ) ) : ?>
			</div>
			<?php endif; ?>

			<?php echo  $after_widget; ?>

			<?php wp_reset_postdata();
		}

		/**
		 * Registers the widget with the WordPress Widget API.
		 *
		 * @return mixed
		 */
		public static function register() {
			register_widget( __CLASS__ );
		}
	}
endif;

add_action( 'widgets_init', array( 'Angie_Makes_Design_Widget_Static_Content', 'register' ) );
