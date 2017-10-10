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
function bootstrapfast_asset_dir() {
	return get_template_directory_uri() . '/assets';
}

/**
 * Cache buster.
 */
function bootstrapfast_stylesuffix() {
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
 * Hook action in wp_footer when doing pagespeed optimization later
 */
function bootstrapfast_assets() {
		$the_theme = wp_get_theme();

		wp_enqueue_style( 'bootstrapfast-style', bootstrapfast_asset_dir() . '/css/themestyle.min.css', array(), bootstrapfast_stylesuffix() );

		wp_enqueue_script( 'bootstrapfastjs', bootstrapfast_asset_dir() . '/js/themes.min.js', array(), bootstrapfast_stylesuffix(), true );

}
add_action( 'wp_enqueue_scripts', 'bootstrapfast_assets' );

/**
 * Action to insert hook before the body.
 * You still need to insert this hook inside your body.
 */
function bootstrapfast_body_begin() {
	do_action( 'bootstrapfast_body_begin' );
}
