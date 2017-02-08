<?php
/**
 * BootstrapFast Theme Customizer
 *
 * @package BootstrapFast
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bootstrapfast_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bootstrapfast_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bootstrapfast_customize_preview_js() {
	wp_enqueue_script( 'bootstrapfast_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20170101', true );
}
add_action( 'customize_preview_init', 'bootstrapfast_customize_preview_js' );


if ( ! function_exists( 'bootstrapfast_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function bootstrapfast_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'bootstrapfast_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'bootstrapfast' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'bootstrapfast' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'bootstrapfast_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'bootstrapfast' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'bootstrapfast' ),
					'section'     => 'bootstrapfast_theme_layout_options',
					'settings'    => 'bootstrapfast_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'bootstrapfast' ),
						'container-fluid' => __( 'Full width container', 'bootstrapfast' ),
					),
					'priority'    => '10',
				)
			)
		);

		$wp_customize->add_setting( 'bootstrapfast_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bootstrapfast_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'bootstrapfast' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'bootstrapfast' ),
					'section'     => 'bootstrapfast_theme_layout_options',
					'settings'    => 'bootstrapfast_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'bootstrapfast' ),
						'left'  => __( 'Left sidebar', 'bootstrapfast' ),
						'both'  => __( 'Left & Right sidebars', 'bootstrapfast' ),
						'none'  => __( 'No sidebar', 'bootstrapfast' ),
					),
					'priority'    => '20',
				)
			)
		);
	}
}

add_action( 'customize_register', 'bootstrapfast_theme_customize_register' );
