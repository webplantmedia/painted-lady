<?php
add_action( 'wp_dashboard_setup', 'crimson_rose_dashboard_widgets' );
  
function crimson_rose_dashboard_widgets() {
	global $wp_meta_boxes;
	 
	$display_version = CRIMSON_ROSE_VERSION;

	wp_add_dashboard_widget('crimson_rose_help_widget', 'Crimson Rose WordPress Theme - Version&nbsp;' . $display_version, 'crimson_rose_dashboard_widget');
}
 
function crimson_rose_dashboard_static_short_services() {
	$services = crimson_rose_dashboard_get_services();
	$first = true;
	?>

	<p style="border-top:1px solid #eee;padding-top:1em;">

	<?php foreach( $services as $service ) : ?>

		<?php if ( ! $first ) : ?> 
			<span style="color:#ddd;">|</span>
		<?php endif; ?>

		<a href="<?php echo $service['link']; ?>" target="_blank"><?php echo $service['short']; ?>
			<span class="screen-reader-text">(opens in a new window)</span>
			<span aria-hidden="true" class="dashicons dashicons-external"></span>
		</a>

		<?php $first = false; ?>

	<?php endforeach; ?>

	</p>

	<?php
}

function crimson_rose_dashboard_get_services() {
	$services = array(
		array(
			'short' => __( 'Documentation', 'crimson-rose' ),
			'title' => __( 'Theme Documentation', 'crimson-rose' ),
			'link' => 'https://webplantmedia.com/product/crimson-rose-wordpress-theme/',
			'description' => sprintf( __( 'Every theme option and theme feature is well documented on our product page. Find out all the amazing features coded within our theme.', 'crimson-rose' ) ),
		),
		array(
			'short' => __( 'Support', 'crimson-rose' ),
			'title' => __( 'Extended WordPress Support', 'crimson-rose' ),
			'link' => 'https://webplantmedia.com/product/extended-wordpress-support/',
			'description' => sprintf( __( 'If you are using one of our themes, and need WordPress support, a little CSS hack, or some custom debugging support for your WordPress site, then you can purchase extended WordPress support. We are WordPress experts, and will quickly and efficiently take care of your site problem or need.', 'crimson-rose' ) ),
		),
		array(
			'short' => __( 'Font Customizer Plugin', 'crimson-rose' ),
			'title' => __( 'Designer Fonts Plugin', 'crimson-rose' ),
			'link' => 'https://webplantmedia.com/product/designer-fonts-wordpress-plugin/',
			'description' => sprintf( __( 'Use our Designer Fonts plugin to quickly and easily customize the default fonts on your theme. Easily change your site title font, heading font, accent font, and body font, from your Customizer panel using our Designer Fonts plugin.', 'crimson-rose' ) ),
		),
	);

	return $services;
}

function crimson_rose_dashboard_static_feed() {
	$blog = array(
		array(
			'title' => 'The Best Setup For Your Self Hosted WordPress Shopping Site and Blog',
			'link' => 'https://webplantmedia.com/the-best-setup-for-your-wordpress-shopping-site-and-blog/',
		),
		array(
			'title' => 'How to Transfer and Migrate Your Site Content from WordPress.com to a Self Hosted WordPress.org Site on Bluehost – Step By Step Instructions',
			'link' => 'https://webplantmedia.com/how-to-transfer-and-migrate-your-site-content-from-wordpress-com-to-a-self-hosted-wordpress-org-site-on-bluehost-step-by-step-instructions/',
		),
		array(
			'title' => 'WordPress.com vs WordPress.org: What is the Difference?',
			'link' => 'https://webplantmedia.com/wordpress-com-vs-wordpress-org-what-is-the-difference/',
		),
		array(
			'title' => 'The Best Managed WordPress Hosting for Your Small Business Site',
			'link' => 'https://webplantmedia.com/the-best-managed-wordpress-hosting-for-your-small-business-site/',
		),
	);
	?>

	<?php foreach( $blog as $post ) : ?>
		<div>
			<span class="dashicons dashicons-thumbs-up" style="color:#82878c;float:left;"></span>
			<p style="overflow:hidden;padding-left:10px;">
				<a target="_blank" href="<?php echo $post['link']; ?>"><?php echo $post['title']; ?></a>
			</p>
		</div>
	<?php endforeach; ?>

	<?php
}

function crimson_rose_dashboard_widget() {
	crimson_rose_dashboard_static_feed();
	crimson_rose_dashboard_static_short_services();
}

add_action('admin_menu', 'crimson_rose_theme_info');

function crimson_rose_theme_info() {
	add_theme_page('Theme Info', 'Theme Info', 'read', 'crimson-rose-theme-info', 'crimson_rose_theme_page');
}

function crimson_rose_theme_page() {
	require get_parent_theme_file_path() . '/inc/theme-info.php';
}
