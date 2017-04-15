<?php
/**
 * This organizes the loading of css and js file assets.
 *
 * @package BootstrapFast
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'restricted access' );
}

/**
 * OOP load directory.
 */
function asset_dir() {
	return get_template_directory_uri() . '/assets';
}

/**
 * Cache buster.
 */
function stylesuffix() {
	$the_theme = wp_get_theme();
	return $the_theme->get( 'Version' );
}

if ( ! function_exists( 'bootstrapfast_asset_head' ) ) {

	/**
	 * Scripts and assets that needed to load in the header.
	 * JQuery, etc.
	 */
	function bootstrapfast_asset_head() {
		wp_enqueue_script( 'jquery' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrapfast_asset_head' );

/**
 * Set of scripts and styles being loaded in the body.
 */
function bootstrapfast_footer() {
		$the_theme = wp_get_theme();

		wp_enqueue_style( 'bootstrapfast-style', asset_dir() . '/css/themestyle.css', array(), stylesuffix() );

		wp_enqueue_script( 'bootstrapfastjs', asset_dir() . '/js/themes.js', array(), stylesuffix(), true );

		wp_enqueue_script( 'bootstrapfast-nav', asset_dir() . '/js/navigation.js', array( 'jquery' ), stylesuffix(), true );

}
add_action( 'wp_footer', 'bootstrapfast_footer' );

/**
 * Action to insert hook before the body.
 * You still need to insert this hook inside your body.
 */
function body_begin() {
	do_action( 'body_begin' );
}
