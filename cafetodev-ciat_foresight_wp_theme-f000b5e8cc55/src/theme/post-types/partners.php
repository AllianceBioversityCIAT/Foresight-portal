<?php
/**
 * Registers the `Partner` post type.
 */
function Partner_init() {
	register_post_type( 'partner', array(
		'labels'                => array(
			'name'                  => __( 'CGIAR Partners', 'foresight_theme' ),
			'singular_name'         => __( 'Partner', 'foresight_theme' ),
			'all_items'             => __( 'All Partners', 'foresight_theme' ),
			'archives'              => __( 'Partner Archives', 'foresight_theme' ),
			'attributes'            => __( 'Partner Attributes', 'foresight_theme' ),
			'insert_into_item'      => __( 'Insert into Partner', 'foresight_theme' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Partner', 'foresight_theme' ),
			'featured_image'        => _x( 'Featured Image', 'partner', 'foresight_theme' ),
			'set_featured_image'    => _x( 'Set featured image', 'partner', 'foresight_theme' ),
			'remove_featured_image' => _x( 'Remove featured image', 'partner', 'foresight_theme' ),
			'use_featured_image'    => _x( 'Use as featured image', 'partner', 'foresight_theme' ),
			'filter_items_list'     => __( 'Filter Partners list', 'foresight_theme' ),
			'items_list_navigation' => __( 'Partners list navigation', 'foresight_theme' ),
			'items_list'            => __( 'Partners list', 'foresight_theme' ),
			'new_item'              => __( 'New Partner', 'foresight_theme' ),
			'add_new'               => __( 'Add New', 'foresight_theme' ),
			'add_new_item'          => __( 'Add New Partner', 'foresight_theme' ),
			'edit_item'             => __( 'Edit Partner', 'foresight_theme' ),
			'view_item'             => __( 'View Partner', 'foresight_theme' ),
			'view_items'            => __( 'View Partners', 'foresight_theme' ),
			'search_items'          => __( 'Search Partners', 'foresight_theme' ),
			'not_found'             => __( 'No Partners found', 'foresight_theme' ),
			'not_found_in_trash'    => __( 'No Partners found in trash', 'foresight_theme' ),
			'parent_item_colon'     => __( 'Parent Partner:', 'foresight_theme' ),
			'menu_name'             => __( 'CGIAR Partners', 'foresight_theme' ),
		),
		'public'                => false,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'data:image/svg+xml;base64, PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNiIgaGVpZ2h0PSIzNiIgdmlld0JveD0iMCAwIDM2IDM2Ij4NCiAgPGcgaWQ9Ikdyb3VwXzEyOTEiIGRhdGEtbmFtZT0iR3JvdXAgMTI5MSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTU3MCAtNTkwKSI+DQogICAgPGcgaWQ9Ikdyb3VwXzEyOTAiIGRhdGEtbmFtZT0iR3JvdXAgMTI5MCI+DQogICAgICA8cmVjdCBpZD0iUmVjdGFuZ2xlXzEwMiIgZGF0YS1uYW1lPSJSZWN0YW5nbGUgMTAyIiB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHJ4PSIxOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNTcwIDU5MCkiIGZpbGw9IiNmZmM4NGYiLz4NCiAgICAgIDxwYXRoIGlkPSJQYXRoXzEzMDkxIiBkYXRhLW5hbWU9IlBhdGggMTMwOTEiIGQ9Ik0zLjkwOC0yMC44NTNWLTM3LjkzOEgxNS42MnYyLjg5SDcuMzU3Vi0zMUgxNC40OXYyLjg5SDcuMzU3djcuMjYxWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNTc4Ljk2NSA2MzguNjc2KSIgZmlsbD0iI2ZmZiIvPg0KICAgIDwvZz4NCiAgPC9nPg0KPC9zdmc+DQo=',
		'show_in_rest'          => true,
		'rest_base'             => 'partner',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}

add_action( 'init', 'Partner_init' );

/**
 * Sets the post updated messages for the `partner` post type.
 *
 * @param array $messages Post updated messages.
 *
 * @return array Messages for the `partner` post type.
 */
function partner_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages[ 'partner' ] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Partner updated. <a target="_blank" href="%s">View Partner</a>', 'foresight_theme' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'foresight_theme' ),
		3  => __( 'Custom field deleted.', 'foresight_theme' ),
		4  => __( 'Partner updated.', 'foresight_theme' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET[ 'revision' ] ) ? sprintf( __( 'Partner restored to revision from %s', 'foresight_theme' ), wp_post_revision_title( (int)$_GET[ 'revision' ], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Partner published. <a href="%s">View Partner</a>', 'foresight_theme' ), esc_url( $permalink ) ),
		7  => __( 'Partner saved.', 'foresight_theme' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Partner submitted. <a target="_blank" href="%s">Preview Partner</a>', 'foresight_theme' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Partner scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Partner</a>', 'foresight_theme' ),
			date_i18n( __( 'M j, Y @ G:i', 'foresight_theme' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Partner draft updated. <a target="_blank" href="%s">Preview Partner</a>', 'foresight_theme' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}

add_filter( 'post_updated_messages', 'partner_updated_messages' );
