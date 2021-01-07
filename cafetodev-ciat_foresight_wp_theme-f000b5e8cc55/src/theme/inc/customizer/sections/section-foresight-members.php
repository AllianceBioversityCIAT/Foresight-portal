<?php
/**
 * CIAT Foresight Home Members.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_members( $wp_customize ) {
	$custom_panel_home_members   = 'custom-panel-home-members';
	$custom_section_home_members = 'custom-section-home-members';

	customize_add_panel( $wp_customize, $custom_panel_home_members, '[Theme] Panel Members' );

	customize_add_section( $wp_customize, $custom_panel_home_members, $custom_section_home_members, 'Information and Background Image' );

	//Information.
	customize_add_setting( $wp_customize, 'foresight-members-title', '#foresight-members-title' );

	customize_add_control_text( $wp_customize, $custom_section_home_members, 'foresight-members-title',
		'foresight-members-title-control', 'Add Title.' );

	customize_add_setting( $wp_customize, 'foresight-members-info', '' );

	customize_add_control_textarea( $wp_customize, $custom_section_home_members, 'foresight-members-info',
		'foresight-members-info-control', 'Add Information.' );

	//Image
	customize_add_setting( $wp_customize, 'foresight-members-image', '' );

	customize_add_control_image( $wp_customize, $custom_section_home_members, 'foresight-members-image',
		'foresight-members-image-control', 'Add Member Image.' );

	customize_add_setting( $wp_customize, 'foresight-members-background', '' );

	customize_add_control_image( $wp_customize, $custom_section_home_members, 'foresight-members-background',
		'foresight-members-background-control', 'Add Background Image.' );
}

add_action( 'customize_register', 'register_customizer_section_foresight_members' );
