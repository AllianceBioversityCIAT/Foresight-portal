<?php
/**
 * This function records fields for the acf.
 */
function register_custom_acf_fields_post_type_cgiar_partner() {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		acf_add_local_field_group( [
				'key'                   => 'group_post_type_cgiar_partner',
				'title'                 => 'CGIAR Partner Info',
				'fields'                => [
					[
						'key'               => 'cgiar_partner_contact_point',
						'label'             => 'Add Contact Point',
						'name'              => 'partner_contact_point',
						'type'              => 'text',
						'wrapper'           => [
							'width' => '50',
						],
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'partner',
						]
					],
				],
				'menu_order'            => 0,
				'position'              => 'acf_after_title',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
			]
		);
	}
}

add_action( 'init', 'register_custom_acf_fields_post_type_cgiar_partner' );

