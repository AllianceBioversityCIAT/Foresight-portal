<?php
/**
 * CIAT Foresight Home Contributions.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_contributions( $wp_customize ) {
	$custom_panel_home_contributions   = 'custom-panel-home-contributions';
	$custom_section_home_contributions = 'custom-section-home-contributions';

	customize_add_panel( $wp_customize, $custom_panel_home_contributions, '[Theme] Panel Contributions' );

	customize_add_section( $wp_customize, $custom_panel_home_contributions, $custom_section_home_contributions, 'Select Page' );

	//Dropdown pages
	$wp_customize->add_setting( 'foresight-contributions-dropdown-pages',
		array(
			'default' => '0',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'foresight-contributions-dropdown-pages',
		array(
			'selector' => '#foresight-contributions-title',
		)
	);

	$wp_customize->add_control( 'foresight-contributions-dropdown-pages',
		array(
			'label' => __( 'Select Page' ),
			'description' => esc_html__( 'Page to display in the section' ),
			'section' => $custom_section_home_contributions,
			'type' => 'dropdown-pages',
		)
	);
}

add_action( 'customize_register', 'register_customizer_section_foresight_contributions' );
