<?php
/**
 * Additional custom theme functions.
 *
 * @package BootstrapFast
 */

/**
 * Top overrides for the header area.
 */
function main_header_style() {
	$maincontainer = get_theme_mod( 'bootstrapfast_mainheader_position' );
	if ( 'left' === $maincontainer ) {
		return 'col-md-3';
	} elseif ( 'right' === $maincontainer ) {
		return 'col-md-3 push-md-9';
	} else {
		return 'col-md-12';
	}
}

/**
 * Body overrides.
 */
function main_body_style() {
	$maincontainer = get_theme_mod( 'bootstrapfast_mainheader_position' );
	if ( 'left' === $maincontainer ) {
		return 'col-md-9';
	} elseif ( 'right' === $maincontainer ) {
		return 'col-md-9 pull-md-3';
	} else {
		return 'col-md-12';
	}
}

/**
 * Container is fluid or not overrides.
 */
function container_type() {
	$container = get_theme_mod( 'bootstrapfast_container_type' );
	if ( 'container' === $container ) {
		return 'container';
	} else {
		return 'container-fluid';
	}
}
