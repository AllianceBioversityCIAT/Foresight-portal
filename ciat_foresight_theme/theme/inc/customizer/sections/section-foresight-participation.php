<?php
/**
 * CIAT Foresight Home Participation.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_participation( $wp_customize ) {
	$custom_panel_home_participation   = 'custom-panel-home-participation';
	$custom_section_home_participation = 'custom-section-home-participation';

	customize_add_panel( $wp_customize, $custom_panel_home_participation, '[Theme] Panel Participation' );

	customize_add_section( $wp_customize, $custom_panel_home_participation, $custom_section_home_participation, 'Information' );

	//Information.
	customize_add_setting( $wp_customize, 'foresight-participation-title', '#foresight-participation-title' );

	customize_add_control_text( $wp_customize, $custom_section_home_participation, 'foresight-participation-title',
		'foresight-participation-title-control', 'Add Title.' );
}

add_action( 'customize_register', 'register_customizer_section_foresight_participation' );
