<?php

/**
 * CIAT Foresight Recent Publications.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the recent publications section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_recent_publications( $wp_customize ) {
	$custom_panel_home_recent_posts   = 'custom-panel-recent_posts';
	$custom_section_home_recent_posts = 'custom-section-recent_posts';

	customize_add_panel( $wp_customize, $custom_panel_home_recent_posts, '[Theme] Panel Recent Posts' );

	customize_add_section( $wp_customize, $custom_panel_home_recent_posts, $custom_section_home_recent_posts, 'Title section' );
	
	//Information.
	customize_add_setting( $wp_customize, 'foresight_recent_posts_title', '#foresight-publication-title' );
	
	customize_add_control_text( $wp_customize, $custom_section_home_recent_posts, 'foresight_recent_posts_title',
	'foresight_recent_posts_title_control', 'Add Title.' );
}

add_action( 'customize_register', 'register_customizer_section_foresight_recent_publications' );
