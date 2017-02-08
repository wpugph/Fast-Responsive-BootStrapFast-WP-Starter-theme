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
	if ( 'top' === $maincontainer ) {
		return 'col-md-12';
	} elseif ( 'left' === $maincontainer ) {
		return 'col-md-3';
	} elseif ( 'right' === $maincontainer ) {
		return 'col-md-3 push-md-9';
	}
}

/**
 * Body overrides.
 */
function main_body_style() {
	$maincontainer = get_theme_mod( 'bootstrapfast_mainheader_position' );
	if ( 'top' === $maincontainer ) {
		return 'col-md-12';
	} elseif ( 'left' === $maincontainer ) {
		return 'col-md-9';
	} elseif ( 'right' === $maincontainer ) {
		return 'col-md-9 pull-md-3';
	}
}
