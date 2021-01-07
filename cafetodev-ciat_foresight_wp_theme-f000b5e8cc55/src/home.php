<?php
/**
 * The template for displaying the home.
 */

global $paged;
$active_components = get_option( 'checkbox_setting_active_components' );
$context           = Timber::context();

if ( is_array( $active_components ) && in_array( 'active_coming_soon_page', $active_components ) ) {

	get_header( 'coming-soon' );

	Timber::render( './view/coming-soon-page/home-coming-soon.twig', $context );

	get_footer( 'coming-soon' );

} else {
	get_header();

	if ( class_exists( 'Timber' ) ) {

		/** section Recent publications */
			$args2 = array(
				'post_type' => 'post',
				'posts_per_page' => 6,
			);
		
			$context['foresight_posts_publication'] = new Timber\PostQuery($args2);
			$context['foresight_images_default_publication'] = get_stylesheet_directory_uri() . '/static/images/default_publish.jpg';
			$context['foresight_title_publications_recent'] = customize_theme_mod( 'foresight_recent_posts_title' );

		/** section Recent publications */

		/*Section contact Us */
		if ( $_GET ) {
			$context[ 'success_email' ] = $_GET[ 'success_email' ];
		} else {
			$context[ 'success_email' ] = false;
		}
		/*Section contact Us */

		/* Section What is foresight? */
		$foresight_what_id                = customize_theme_mod( 'foresight-what-dropdown-pages' );
		$context[ 'foresight_what_page' ] = new Timber\Post( $foresight_what_id );
		/* Section What is foresight? */

		/* Section What does CG Foresight */
		$foresight_contributions_id                = customize_theme_mod( 'foresight-contributions-dropdown-pages' );
		$context[ 'foresight_contributions_page' ] = new Timber\Post( $foresight_contributions_id );
		/* Section What does CG Foresight */

		/* Section Partners Foresight */
		$foresight_partner_first_id                = customize_theme_mod( 'foresight-partners-first-dropdown-pages' );
		$context[ 'foresight_partner_first_page' ] = new Timber\Post( $foresight_partner_first_id );

		$foresight_partner_second_id                = customize_theme_mod( 'foresight-partners-second-dropdown-pages' );
		$context[ 'foresight_partner_second_page' ] = new Timber\Post( $foresight_partner_second_id );
		/* Section What does CG Foresight */

		/* Section CGIAR Partners */
		$args                                      = [
			'post_type'      => 'partner',
			'posts_per_page' => -1,
		];
		$context[ 'foresight_cgiar_partner_page' ] = Timber::get_posts( $args );

		Timber::render( './view/home.twig', $context );

	} else {
		echo '<h1>Timber plugin is required</h1>';
	}

	get_footer();
}
