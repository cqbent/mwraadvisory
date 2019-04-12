<?php
class TDWUR_Avada_Theme {
	private $active;

	function __construct() {
		add_filter( 'webmaster_supported_theme', array( $this, 'is_supported_theme' ) );
		add_filter( 'webmaster_supported_theme_setting_fields', array( $this, 'setting_fields' ) );
	}

	function is_supported_theme( $supported ) {
		if ( $supported ) return $supported;
		
		return $this->is_active();
	}

	function is_active() {
		if ( $this->active ) return true;

		$current_theme = wp_get_theme();
		if ( $current_theme->Name=='Avada' || $current_theme->Template=='Avada' ) {
			$this->active = true;
			add_action( 'admin_menu', array( $this, 'remove_admin_menu' ), 100 );
			add_action( 'init', array( $this, 'hide_options_panel' ) );

			return true;
		}

		return false;
	}

	function setting_fields( $fields = array() ) {
		if ( ! $this->is_active() ) return $fields;

		$fields = array();
		$fields[] = array(
			'id'        => 'avada_theme_settings',
			'type'      => 'checkbox',
			'title'     => __('Avada Theme Compatibility', 'webmaster-user-role'),
			'subtitle'  => __('Webmaster (Admin) users can', 'webmaster-user-role'),

			'options'   => array(
				'access_theme_options_panel' => __('Access Theme Options panel', 'webmaster-user-role'),
			),

			'default'   => array(
				'access_theme_options_panel' => '0',
			)
		);

		return $fields;
	}

	function hide_options_panel() {
		if ( !TD_WebmasterUserRole::current_user_is_webmaster() ) return;

		$webmaster_user_role_config = TD_WebmasterUserRole::get_config();
		if ( !is_array( $webmaster_user_role_config ) ) return;

		if ( !$this->is_active() ) return;

		if ( empty( $webmaster_user_role_config['avada_theme_settings']['access_theme_options_panel'] ) ) {
			remove_action('admin_menu', 'optionsframework_add_admin');
		}
	}

	function remove_admin_menu() {
		if ( !TD_WebmasterUserRole::current_user_is_webmaster() ) return;

		$webmaster_user_role_config = TD_WebmasterUserRole::get_config();
		if ( !is_array( $webmaster_user_role_config ) ) return;

		remove_menu_page( 'avada' );
	}

}
new TDWUR_Avada_Theme();