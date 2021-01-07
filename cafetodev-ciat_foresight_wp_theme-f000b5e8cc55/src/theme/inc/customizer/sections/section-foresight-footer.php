<?php
/**
 * CIAT Foresight footer.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_footer( $wp_customize ) {
	$custom_panel_home_footer   = 'custom-panel-home-footer';
	$custom_section_home_footer = 'custom-section-home-footer';

	customize_add_panel( $wp_customize, $custom_panel_home_footer, '[Theme] Panel Footer' );

	customize_add_section( $wp_customize, $custom_panel_home_footer, $custom_section_home_footer, 'Information' );

	//Information.
	customize_add_setting( $wp_customize, 'foresight-footer-contact-one', '#foresight-footer-info' );

	customize_add_control_text( $wp_customize, $custom_section_home_footer, 'foresight-footer-contact-one',
		'foresight-footer-contact-one-control', 'Add First Contact.' );

	customize_add_setting( $wp_customize, 'foresight-footer-contact-email-one', '' );

	customize_add_control_text( $wp_customize, $custom_section_home_footer, 'foresight-footer-contact-email-one',
		'foresight-footer-contact-email-one-control', 'Add Email.' );

	customize_add_setting( $wp_customize, 'foresight-footer-contact-two', '' );

	customize_add_control_text( $wp_customize, $custom_section_home_footer, 'foresight-footer-contact-two',
		'foresight-footer-contact-two-control', 'Add Second Contact.' );

	customize_add_setting( $wp_customize, 'foresight-footer-contact-email-two', '' );

	customize_add_control_text( $wp_customize, $custom_section_home_footer, 'foresight-footer-contact-email-two',
		'foresight-footer-contact-email-two-control', 'Add Email.' );

	customize_add_setting( $wp_customize, 'foresight-footer-copyright', '' );

	customize_add_control_text( $wp_customize, $custom_section_home_footer, 'foresight-footer-copyright',
		'foresight-footer-copyright-control', 'Add Copyright.' );
}

add_action( 'customize_register', 'register_customizer_section_foresight_footer' );
