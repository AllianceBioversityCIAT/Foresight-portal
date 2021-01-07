<?php
define('PAGE_SLUG_SETTINGS', 'settings_admin_theme');

class PageSettings
{

	public function __construct()
	{
		add_action('admin_menu', array($this, 'create_settings_page'));

		add_action('admin_init', array($this, 'setup_sections'));
		add_action('admin_init', array($this, 'setup_fields'));
	}

	/**
	 * This function creates all the settings for the page that is added to the WordPress administrator menu.
	 */
	public function create_settings_page()
	{

		// Add the menu item and page
		$page_title = 'Settings Page';
		$menu_title = 'Settings';
		$capability = 'manage_options';
		$slug       = PAGE_SLUG_SETTINGS;
		$callback   = array($this, 'settings_page_content');
		$icon       = 'data:image/svg+xml;base64, PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNiIgaGVpZ2h0PSIzNiIgdmlld0JveD0iMCAwIDM2IDM2Ij4NCiAgPGcgaWQ9Ikdyb3VwXzEyOTEiIGRhdGEtbmFtZT0iR3JvdXAgMTI5MSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTU3MCAtNTkwKSI+DQogICAgPGcgaWQ9Ikdyb3VwXzEyOTAiIGRhdGEtbmFtZT0iR3JvdXAgMTI5MCI+DQogICAgICA8cmVjdCBpZD0iUmVjdGFuZ2xlXzEwMiIgZGF0YS1uYW1lPSJSZWN0YW5nbGUgMTAyIiB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHJ4PSIxOCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNTcwIDU5MCkiIGZpbGw9IiNmZmM4NGYiLz4NCiAgICAgIDxwYXRoIGlkPSJQYXRoXzEzMDkxIiBkYXRhLW5hbWU9IlBhdGggMTMwOTEiIGQ9Ik0zLjkwOC0yMC44NTNWLTM3LjkzOEgxNS42MnYyLjg5SDcuMzU3Vi0zMUgxNC40OXYyLjg5SDcuMzU3djcuMjYxWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNTc4Ljk2NSA2MzguNjc2KSIgZmlsbD0iI2ZmZiIvPg0KICAgIDwvZz4NCiAgPC9nPg0KPC9zdmc+DQo=';
		$position   = 32;
		add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
	}

	/**
	 * This function adds the entire structure of the page, such as the fields and the submit button.
	 */
	public function settings_page_content()
	{ ?>
		<div class="wrap">
			<h2>Plugins Settings Page</h2><?php
											if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
												$this->admin_notice();
											} ?>
			<form method="POST" action="options.php">
				<?php
				settings_fields(PAGE_SLUG_SETTINGS);
				do_settings_sections(PAGE_SLUG_SETTINGS);
				submit_button();
				?>
			</form>
		</div> <?php
			}

			/**
			 * This function adds an alert each time the form is saved or updated.
			 */
			public function admin_notice()
			{ ?>
		<div class="notice notice-success is-dismissible">
			<p>Your settings have been updated!</p>
		</div><?php
			}

			/**
			 * This function adds sections to the form so that the fields are displayed in them.
			 */
			public function setup_sections()
			{
				add_settings_section('settings_section_activate_components', 'Configuration to activate components.', array($this, 'section_callback'), PAGE_SLUG_SETTINGS);
				add_settings_section('settings_section_recaptcha', 'Add keys to recaptcha configuration', array($this, 'section_callback'), PAGE_SLUG_SETTINGS);
				add_settings_section( 'foresight_google_analytics_section', 'Google Analytics', array( $this, 'section_callback' ), PAGE_SLUG_SETTINGS );
			}

			/**
			 * This function adds a description to each section of the form.
			 *
			 * @param $arguments array get the information of each section.
			 */
			public function section_callback($arguments)
			{
				switch ($arguments['id']) {
					case 'settings_section_activate_components':
						echo 'This section will serve to disable components of the theme, in case they are no longer necessary for its functionality.';
						break;
					case 'settings_section_recaptcha':
						echo 'This section will serve to validate recapthca in all calls from form contact.';
						break;
					case 'foresight_google_analytics_section':
						echo 'The Google Analytics tag is a snippet of JavaScript that collects and sends data to Analytics from this website.';
						break;
				}
			}

			/**
			 * This function creates and adds each field to a specific section.
			 */
			public function setup_fields()
			{
				$fields = [
					[
						'uid'          => 'checkbox_setting_active_components',
						'label'        => 'Components',
						'section'      => 'settings_section_activate_components',
						'type'         => 'checkbox',
						'options' => [
							'active_coming_soon_page' => 'Active Coming Soon page',
						],
						'default'      => '',
						'helper'       => '',
						'supplimental' => '',
					],
					[
						'uid'          => 'recaptcha_site_key',
						'label'        => 'Site Key',
						'section'      => 'settings_section_recaptcha',
						'type'         => 'text',
						'default'      => '',
						'placeholder'  => '',
						'helper'       => '',
						'supplimental' => '',
					],
					[
						'uid'          => 'recaptcha_secret_key',
						'label'        => 'Secret Key',
						'section'      => 'settings_section_recaptcha',
						'type'         => 'text',
						'default'      => '',
						'placeholder'  => '',
						'helper'       => '',
						'supplimental' => '',

					],
					[
						'uid'          => 'recaptcha_score',
						'label'        => 'Score recaptcha',
						'section'      => 'settings_section_recaptcha',
						'type'         => 'number',
						'default'      => '',
						'placeholder'  => '',
						'helper'       => '',
						'supplimental' => '',

					],
					[
						'uid'          => 'google_analytics_tracking_id',
						'label'        => 'Tracking ID',
						'section'      => 'foresight_google_analytics_section',
						'type'         => 'text',
						'default'      => '',
						'placeholder'  => '',
						'helper'       => '',
						'supplimental' => '',
					]
				];
				foreach ($fields as $field) {
					add_settings_field($field['uid'], $field['label'], array($this, 'field_callback'), PAGE_SLUG_SETTINGS, $field['section'], $field);
					register_setting(PAGE_SLUG_SETTINGS, $field['uid']);
				}
			}

			/**
			 * This function creates the fields for the form.
			 *
			 * @param $arguments array get the information of each section.
			 */
			public function field_callback($arguments)
			{
				$value = get_option($arguments['uid']);
				if (!$value) {
					$value = $arguments['default'];
				}
				switch ($arguments['type']) {
					case 'text':
					case 'password':
					case 'number':
						printf('<input name="%1$s" id="%1$s" type="%2$s" step="any" placeholder="%3$s" value="%4$s" class="large-text"/>', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value);
						break;
					case 'readonly':
						printf('<input name="%1$s" id="%1$s" type="hidden" value="%4$s"/> <p>%4$s</p>', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value);
						break;
					case 'textarea':
						printf('<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value);
						break;
					case 'select':
					case 'multiselect':
						if (!empty($arguments['options']) && is_array($arguments['options'])) {
							$attributes     = '';
							$options_markup = '';
							foreach ($arguments['options'] as $key => $label) {
								$options_markup .= sprintf('<option value="%s" %s>%s</option>', $key, selected($value[array_search($key, $value, true)], $key, false), $label);
							}
							if ($arguments['type'] === 'multiselect') {
								$attributes = ' multiple="multiple" ';
							}
							printf('<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup);
						}
						break;
					case 'radio':
					case 'checkbox':
						if (!empty($arguments['options']) && is_array($arguments['options'])) {
							$options_markup = '';
							$iterator       = 0;
							foreach ($arguments['options'] as $key => $label) {
								$iterator++;
								$options_markup .= sprintf('<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked($value[array_search($key, $value, true)], $key, false), $label, $iterator);
							}
							printf('<fieldset>%s</fieldset>', $options_markup);
						}
						break;
				}
				if ($helper = $arguments['helper']) {
					printf('<span class="helper"> %s</span>', $helper);
				}
				if ($supplimental = $arguments['supplimental']) {
					printf('<p class="description">%s</p>', $supplimental);
				}
			}
		}
