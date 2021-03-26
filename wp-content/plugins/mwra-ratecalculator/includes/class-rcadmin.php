<?php

class RateCalculatorAdmin {
	/*
	 * construct class
	 */
	function __construct()
	{
		$this->rcadmin_load();
	}

	function rcadmin_load() {
		// add actions/filters
		if (is_admin()) {
			// do something
		}
		// register settings and add fields; form page; display ga code
		add_action('admin_init', array($this, 'rc_register_settings')); // register settings and fields
		add_action('admin_menu', array($this, 'rc_admin_menu')); // add admin menu item that calls settings page
	}

	function rc_register_settings() {
		register_setting('ratecalculator', 'rc_settings');
		add_settings_section('rc_gf_options', 'Rate calculator GF Options', array($this, 'rc_gf_section'), 'ratecalculator');
		add_settings_field('rc_gf_id', 'Rate calculator GF ID', array($this, 'rc_field_render'), 'ratecalculator', 'rc_gf_options');
	}

	/*
	 * main rate calculator function (takes arguments?)
	 */

	function rc_admin_menu() {
		//add_submenu_page('ratecalculator-settings', 'Rate Calculator Settings', 'Rate Calculator Settings', 'manage_options', 'ratecalculator-settings', array())
		add_submenu_page('options-general.php', 'Rate Calculator Settings', 'Rate Calculator Settings', 'manage_options', 'rc-settings', array($this, 'rc_admin_page'));
	}

	function rc_gf_section() {
		?>
		<p>Fill out the fields below:</p>
		<?php
	}

	function rc_field_render() {
		// get gf forms and display as dropdown list
		$options = get_option('rc_settings');
		$forms = GFAPI::get_forms();
		$field = '<select name="rc_settings[rc_gf_id]">';
		foreach ($forms as $form) {
			$field .= '<option value="'.$form['id']. '" ' . selected($options['rc_gf_id'], $form['id'], false) . '">' .$form['title'].'</option>';
		}
		$field .= '</select>';
		print $field;
	}


	/*
	 * admin page
	 */
	function rc_admin_page() {
		// check user capabilities
		if (!current_user_can('manage_options')) {
			return;
		}
		?>
		<div class="wrap">
			<h1>Rate Calculator Settings</h1>
			<form action="options.php" method="post">
				<?php
				// output security fields for the registered setting "wporg_options"
				settings_fields('ratecalculator');
				// output setting sections and their fields
				// (sections are registered for "wporg", each field is registered to a specific section)
				do_settings_sections('ratecalculator');
				// output save settings button
				submit_button('Save Settings');
				?>
			</form>
		</div>
		<?php
	}
}
