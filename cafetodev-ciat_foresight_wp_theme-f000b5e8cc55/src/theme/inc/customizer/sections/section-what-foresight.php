<?php
/**
 * CIAT Foresight Home what foresight.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_what_foresight( $wp_customize ) {
	$custom_panel_home_what = 'custom-panel-home-what';
	$custom_section_home_what = 'custom-section-home-what';

	customize_add_panel( $wp_customize, $custom_panel_home_what, '[Theme] Panel What is Foresight' );

	customize_add_section( $wp_customize, $custom_panel_home_what, $custom_section_home_what, 'Select Page' );

	//Dropdown pages
	$wp_customize->add_setting( 'foresight-what-dropdown-pages',
		array(
			'default' => '0',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'foresight-what-dropdown-pages',
		array(
			'selector' => '#what-foresight-title',
		)
	);

	$wp_customize->add_control( 'foresight-what-dropdown-pages',
		array(
			'label' => __( 'Select Page' ),
			'description' => esc_html__( 'Page to display in the section' ),
			'section' => $custom_section_home_what,
			'type' => 'dropdown-pages',
		)
	);
}

add_action('customize_register', 'register_customizer_section_what_foresight');
