<?php
/**
 * This organizes the loading of css and js file assets.
 *
 * @package BootstrapFast
 */

if ( ! function_exists( 'bootstrapfast_scripts' ) ) {
	/**
	 * Load theme's sources.
	 */
	function bootstrapfast_head() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'bootstrapfast-style', get_stylesheet_directory_uri() . '/sass/style.css', array(), $the_theme->get( 'Version' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrapfast_head' );

/**
 * Action to insert hook boder the body.
 */
function body_begin() {
	do_action( 'body_begin' );
}

/**
 * Set of scripts and styles being loaded in the body.
 */
function bootstrapfast_body() {
		$the_theme = wp_get_theme();
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrapfast-nav', get_template_directory_uri() . '/js/navigation.js', array(), $the_theme->get( 'Version' ), true );
}
add_action( 'body_begin', 'bootstrapfast_body' );
