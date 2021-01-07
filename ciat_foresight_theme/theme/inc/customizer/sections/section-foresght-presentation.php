<?php
/**
 * CIAT Foresight Home Presentation.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_presentation( $wp_customize ) {
	$custom_panel_home_presentation   = 'custom-panel-home-presentation';
	$custom_section_home_presentation = 'custom-section-home-presentation';

	customize_add_panel( $wp_customize, $custom_panel_home_presentation, '[Theme] Panel Presentation' );

	customize_add_section( $wp_customize, $custom_panel_home_presentation, $custom_section_home_presentation, 'Information and Background Image' );

	//Information.
	customize_add_setting( $wp_customize, 'foresight_presentation_title', '#foresight-presentation-title' );

	customize_add_control_text( $wp_customize, $custom_section_home_presentation, 'foresight_presentation_title',
		'foresight_presentation_title_control', 'Add Title.' );

	customize_add_setting( $wp_customize, 'foresight_presentation_info', '' );

	customize_add_control_textarea( $wp_customize, $custom_section_home_presentation, 'foresight_presentation_info',
		'foresight_presentation_info_control', 'Add Information.' );

	//Image
	customize_add_setting( $wp_customize, 'foresight_presentation_image', '' );

	customize_add_control_image( $wp_customize, $custom_section_home_presentation, 'foresight_presentation_image',
		'foresight_presentation_image_control', 'Add Background Image.' );
}

add_action( 'customize_register', 'register_customizer_section_foresight_presentation' );
