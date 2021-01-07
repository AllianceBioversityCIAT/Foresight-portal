<?php
/**
 * CIAT Foresight Home Partners.
 *
 * @package foresight_theme.
 */

/**
 * Add customization support for the home section of the theme.
 *
 * @param $wp_customize Theme Customizer object.
 */
function register_customizer_section_foresight_partners( $wp_customize ) {
	$custom_panel_home_partners   = 'custom-panel-home-partners';
	$custom_section_home_partners_background = 'custom-section-home-partners-background';
	$custom_section_home_partners_first_info = 'custom-section-home-partners-first-info';
	$custom_section_home_partners_second_info = 'custom-section-home-partners-second-info';

	customize_add_panel( $wp_customize, $custom_panel_home_partners, '[Theme] Panel Partners' );

	//Background Image.
	customize_add_section( $wp_customize, $custom_panel_home_partners, $custom_section_home_partners_background, 'Background Image' );

	customize_add_setting( $wp_customize, 'foresight_partners_background', '#container-foresight-partners' );

	customize_add_control_image( $wp_customize, $custom_section_home_partners_background, 'foresight_partners_background',
		'foresight_partners_background_control', 'Add Image.' );


	//First Information.
	customize_add_section( $wp_customize, $custom_panel_home_partners, $custom_section_home_partners_first_info, 'First Information and Image' );

	//Dropdown pages
	$wp_customize->add_setting( 'foresight-partners-first-dropdown-pages',
		array(
			'default' => '0',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'foresight-partners-first-dropdown-pages',
		array(
			'selector' => '#foresight-partners-first-title',
		)
	);

	$wp_customize->add_control( 'foresight-partners-first-dropdown-pages',
		array(
			'label' => __( 'Select Page' ),
			'description' => esc_html__( 'Page to display in the section' ),
			'section' => $custom_section_home_partners_first_info,
			'type' => 'dropdown-pages',
		)
	);

	//Second Information.
	customize_add_section( $wp_customize, $custom_panel_home_partners, $custom_section_home_partners_second_info, 'Second Information and Image' );

	//Dropdown pages
	$wp_customize->add_setting( 'foresight-partners-second-dropdown-pages',
		array(
			'default' => '0',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'foresight-partners-second-dropdown-pages',
		array(
			'selector' => '#foresight-partners-second-title',
		)
	);

	$wp_customize->add_control( 'foresight-partners-second-dropdown-pages',
		array(
			'label' => __( 'Select Page' ),
			'description' => esc_html__( 'Page to display in the section' ),
			'section' => $custom_section_home_partners_second_info,
			'type' => 'dropdown-pages',
		)
	);
}

add_action( 'customize_register', 'register_customizer_section_foresight_partners' );
