<?php
/**
 * rocketwp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rocketwp
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

remove_action('shutdown', 'wp_ob_end_flush_all', 1);


// rocketwp functions and definitions
require get_template_directory() . '/inc/setup.php';

// Add scripts and styles
require get_template_directory() . '/inc/scripts.php';

// Theme Widgets
require get_template_directory() . '/inc/widgets.php';

// Custom Comments
require get_template_directory() . '/inc/custom-comments.php';

// Bootstrap Walker
require get_template_directory() . '/inc/bootstrap-walker.php';

// Pagination
require get_template_directory() . '/inc/pagination.php';

// Implement the Custom Header feature. 
require get_template_directory() . '/inc/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

//Customizer additions.
require get_template_directory() . '/inc/customizer.php';

//Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}