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
		wp_enqueue_style( 'bootstrapfast-style', get_stylesheet_directory_uri() . '/sass/themestyle.css', array(), $the_theme->get( 'Version' ) );
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
		wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.min.js', array(), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'bootstrapfast-nav', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'tether' ), $the_theme->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', 'bootstrapfast_body' );
