<?php

/**
 * CIAT Foresight Home contact.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_contact( $wp_customize ) {
	$custom_panel_home_contact   = 'custom-panel-home-contact';
	$custom_section_home_contact = 'custom-section-home-contact';

	customize_add_panel( $wp_customize, $custom_panel_home_contact, '[Theme] Panel contact' );

	customize_add_section( $wp_customize, $custom_panel_home_contact, $custom_section_home_contact, 'Title and Emails' );
	
	//Information.
	customize_add_setting( $wp_customize, 'foresight_contact_us_title', '#foresight-contact-us-title' );
	
	customize_add_control_text( $wp_customize, $custom_section_home_contact, 'foresight_contact_us_title',
	'foresight_contact_us_title_control', 'Add Title.' );
	
	
	customize_add_setting( $wp_customize, 'foresight_contact_to_email', '' );
	customize_add_control_text( $wp_customize, $custom_section_home_contact, 'foresight_contact_to_email',
	'foresight_contact_us_to_email', 'Add Email.' );
	
	
	customize_add_setting( $wp_customize, 'foresight_contact_email', '' );
	customize_add_control_textarea( $wp_customize, $custom_section_home_contact, 'foresight_contact_email',
	'foresight_contact_us_email_control', 'Add Emails for Bcc.' );
}

add_action( 'customize_register', 'register_customizer_section_foresight_contact' );
