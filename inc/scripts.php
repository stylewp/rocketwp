<?php


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'rocketwp_scripts' ) ) {

/**
 * Enqueue scripts and styles.
 */
function rocketwp_scripts() {

	//Theme Main Style
	wp_enqueue_style( 'rocketwp-style', get_stylesheet_directory_uri() . '/style.min.css', array(), '4.2.1' );

	// Font Awesome 4
	wp_enqueue_style( 'rocketwp-fontawesome-4', get_stylesheet_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css', array(), '4.2.1' );

	// Theme RTL Style
	// wp_style_add_data( 'rocketwp-style', 'rtl', 'replace' );

	// Enqueue jQuery
	//wp_enqueue_script( 'jquery' );

	// Enqueue navigation (include in manifest)
	//wp_enqueue_script( 'rocketwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '12052020', true );

	// Skip Link Focus (include in manifest)
	// wp_enqueue_script( 'rocketwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '12052020', true );
    
    // Theme Main Scripts
	wp_enqueue_script( 'rocketwp-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), ' ', true );

    // Font Awesome 5
	//wp_enqueue_script( 'rocketwp-fa', '//use.fontawesome.com/releases/v5.6.3/js/all.js', array(), '5.6.3' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  }
}
  
add_action( 'wp_enqueue_scripts', 'rocketwp_scripts' );


/**
 * Filter the HTML script tag of `rocketwp-fa` script to add `defer` attribute.
 *
*/
function rocketwp_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'rocketwp-fa'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'rocketwp_defer_scripts', 10, 3 );