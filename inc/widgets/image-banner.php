<?php
/**
 * Section: Image Banner Widget
 *
 * @since Crimson_Rose 1.0.0.
 *
 * @package Crimson_Rose
 */

if ( ! class_exists( 'Crimson_Rose_Widget_Image_Banner_Widget' ) ) :
	/**
	 * Display static content from an specific page.
	 *
	 * @since Crimson_Rose 1.0.0.
	 *
	 * @package Crimson_Rose
	 */
	class Crimson_Rose_Widget_Image_Banner_Widget extends Crimson_Rose_Widget {
		/**
		 * Constructor
		 */
		public function __construct() {
			$this->widget_id          = 'crimson-rose-image-banner';
			$this->widget_cssclass    = 'crimson-rose-image-banner';
			$this->widget_description = __( 'Display an image banner in your footer or sidebar.', 'crimson-rose' );
			$this->widget_name        = __( 'Crimson Rose: Image Banner', 'crimson-rose' );
			$this->settings           = array(
				'page' => array(
					'type'  => 'page',
					'std'   => '',
					'label' => __( 'Select Page:', 'crimson-rose' ),
					'description' => __( 'The post content and featured image will be grabbed from the selected post.', 'crimson-rose' ),
					'sanitize' => 'text',
				),
				'image_width' => array(
					'type'  => 'number',
					'std'   => '',
					'step'  => 5,
					'min'   => 100,
					'max'   => 1600,
					'label' => __( 'Image Width (in pixels)', 'crimson-rose' ),
					'description' => __( 'Set custom size for featured image. Leave blank to use large image display.', 'crimson-rose' ),
					'sanitize' => 'number_blank',
				),
				'image_style' => array(
					'type'  => 'select',
					'std'   => 'round',
					'label' => __( 'Image Style:', 'crimson-rose' ),
					'options' => array(
						'none' => __( 'None', 'crimson-rose' ),
						'round' => __( 'Round', 'crimson-rose' ),
					),
					'sanitize' => 'text',
				),
				'title_position' => array(
					'type'  => 'select',
					'std'   => 'below',
					'label' => __( 'Title Position:', 'crimson-rose' ),
					'options' => array(
						'above' => __( 'Above', 'crimson-rose' ),
						'middle' => __( 'Middle', 'crimson-rose' ),
						'below' => __( 'Below', 'crimson-rose' ),
					),
					'sanitize' => 'text',
				),
				'link' => array(
					'type'  => 'text',
					'std'   => home_url('/'),
					'label' => __( 'Link:', 'crimson-rose' ),
					'sanitize' => 'url',
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

			$p = null;
			$featured_image = null;
			if ( ! empty( $o['page'] ) ) {
				$p = get_post( $o['page'] );
			}

			if ( $p ) {
				$size = 'large';
				if ( $o['image_width'] >= 100 ) {
					$size = array( $o['image_width'], 9999 );
				}
				$featured_image = get_the_post_thumbnail( $p->ID, $size );
			}

			echo  $before_widget;

			$class = array();
			$class[] = 'image-banner-wrapper';
			$class[] = 'image-banner-title-position-' . $o['title_position'];
			$class[] = 'image-banner-style-' . $o['image_style'];
			?>

			<div class="<?php echo esc_attr( implode( ' ', $class ) ); ?>">
				<?php if ( $p ) : ?>
					<?php if ( ! empty( $p->post_title ) && ( $o['title_position'] == 'above' ) ) : ?>
						<?php echo $before_title . esc_html( $p->post_title ) . $after_title; ?>
					<?php endif; ?>

					<?php if ( ! empty( $o['link'] ) ) : ?>
						<a class="image-banner-pic" href="<?php echo esc_url( $o['link'] ); ?>">
					<?php else: ?>
						<div class="image-banner-pic">
					<?php endif; ?>

						<?php if ( $featured_image ) : ?>
							<?php echo $featured_image; ?>
						<?php endif; ?>

						<?php if ( ! empty( $p->post_title ) && ( $o['title_position'] != 'above' ) ) : ?>
							<?php echo $before_title . '<span>' . esc_html( $p->post_title ) . '</span>' . $after_title; ?>
						<?php endif; ?>

					<?php if ( ! empty( $o['link'] ) ) : ?>
						</a>
					<?php else: ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $p->post_content ) ) : ?>
						<div class="image-banner-description">
							<?php echo apply_filters( 'wpautop', $p->post_content ); ?>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<center><em><a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=widgets' ) ); ?>"><?php echo esc_html__( 'Select a page.', 'crimson-rose' ); ?></a></em></center>
				<?php endif; ?>

				<?php if ( $p && get_edit_post_link( $p->ID ) ) : ?>
					<footer class="entry-footer">
						<?php
							edit_post_link(
								sprintf(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Edit <span class="screen-reader-text">%s</span>', 'crimson-rose' ),
									get_the_title()
								),
								'<div class="entry-footer-meta"><span class="edit-link">',
								'</span></div>',
								$p->ID
							);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>

			<?php echo  $after_widget; ?>
			<?php
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

add_action( 'widgets_init', array( 'Crimson_Rose_Widget_Image_Banner_Widget', 'register' ) );
