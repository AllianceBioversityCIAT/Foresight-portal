<?php
/**
 * Customizer Default Variables.
 *
 * @package ciat_foresight_theme.
 */

/**
 * This function builds an array with all the default variables for the customizer.
 *
 * @param $option Gets the identifier for the variables.
 *
 * @return mixed Returns the description of the field found.
 */
function customize_default_variables( $option ) {
	$df = [
		'theme_nav_logo'                        => get_stylesheet_directory_uri() . '/static/images/cafeto_logo.png',
		'foresight_partners_background'         => get_stylesheet_directory_uri() . '/static/images/mask_group_9@2x.jpg',
		'foresight_partners_first_title'        => 'Research Partners',
		'foresight_partners_first_info'         => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		'foresight_partners_first_image_left'   => get_stylesheet_directory_uri() . '/static/images/cafeto_logo.png',
		'foresight_partners_first_image_right'  => get_stylesheet_directory_uri() . '/static/images/cafeto_logo.png',
		'foresight_partners_second_title'       => 'Funding Partners',
		'foresight_partners_second_info'        => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		'foresight_partners_second_image_left'  => get_stylesheet_directory_uri() . '/static/images/cafeto_logo.png',
		'foresight_partners_second_image_right' => get_stylesheet_directory_uri() . '/static/images/cafeto_logo.png',
		'foresight_presentation_title'          => 'CGIAR Foresight',
		'foresight_presentation_info'           => 'Strategic foresight and modeling to support Food systems decisions making.',
		'foresight_presentation_image'          => get_stylesheet_directory_uri() . '/static/images/mask_group_11@2x.jpg',
		'foresight_contact_us_title'            => 'Contact Us',
		'foresight_recent_posts_title'          => 'Recent publications and activities',
		'foresight_contact_to_email'            => 'da-support@cafetosoftware.com',
		'foresight-footer-contact-one'          => 'Prager, Steven (Alliance Bioversity-CIAT)',
		'foresight-footer-contact-email-one'    => 'S.Prager@CGIAR.ORG',
		'foresight-footer-contact-two'          => 'Wiebe, Keith (IFPRI)',
		'foresight-footer-contact-email-two'    => 'K.Wiebe@cgiar.org',
		'foresight-footer-copyright'            => 'Copyright © 2020 CGIAR Foresight All rights reserved.',
		'foresight-members-title'               => 'CGIAR Foresight',
		'foresight-members-info'                => 'Some current and former members of the OneCGIAR Foresight Team.',
		'foresight-members-image'               => get_stylesheet_directory_uri() . '/static/images/mask_group15@2x.jpg',
		'foresight-members-background'          => get_stylesheet_directory_uri() . '/static/images/mask_group16@2x.jpg',
		'foresight-participation-title'         => 'One CGIAR participation',
	];

	// Return default option if not empty
	if ( !empty( $df[ $option ] ) ) {
		return $df[ $option ];
	}
}
