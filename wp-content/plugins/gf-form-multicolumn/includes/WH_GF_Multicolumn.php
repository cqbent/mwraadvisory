<?php

/**
 * The core Multi Columns class that overrides GFAddOn.
 *
 * @link       https://wordpress.org/plugins/gf-form-multicolumn/
 * @since      3.1.1
 *
 * @package    gf-form-multicolumn
 * @subpackage gf-form-multicolumn/includes
 */

namespace WH\GF\Multicolumn\Classes;

use GFAddOn;
use WH\GF\Multicolumn\Admin\WH_GF_Multicolumn_Admin;
use WH\GF\Multicolumn\Site\WH_GF_Multicolumn_Public;

\GFForms::include_addon_framework();

class WH_GF_Multicolumn extends
	GFAddOn {
	protected $plugin_name = 'gf-form-multicolumn';

	// Gravity Forms Class Variables
	protected $_version = '3.1.4';
	protected $_min_gravityforms_version = '1.9';
	protected $_slug = 'gfmc';
	protected $_path = 'gf-form-multicolumn/gf-form-multicolumn.php';
	protected $_full_path = __FILE__;

	private $admin;
	private $public;

	private static $_instance = null;

	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function minimum_requirements() {
		return array (
			'php' => array (
				'version' => '5.6',
			),
		);
	}

	public function pre_init() {
		parent::pre_init();

		add_action( 'plugins_loaded', array ( $this, 'set_locale' ) );
	}

	public function init() {
		parent::init();

		add_filter( 'gform_preview_styles',
		            array ( $this, 'enqueue_admin_preview_scripts' ), 10,
		            2 );
	}

	public function init_admin() {
		parent::init_admin();

		// Used to apply backend only functionality such as adding additional
		// features to the Gravity Forms GUI.
		if ( is_admin() ) {

			$this->admin = new WH_GF_Multicolumn_Admin(
				$this->get_plugin_name(), $this->_version
			);
		}
	}

	public function init_frontend() {
		parent::init_frontend();

		$this->public = new WH_GF_Multicolumn_Public(
			$this->get_plugin_name(), $this->get_version() );

		add_action( 'gform_enqueue_scripts',
		            array ( $this->public, 'dequeue_selected_scripts' ), 11 );

		$this->public->display();
	}

	public function init_ajax() {
		parent::init_ajax();

		$ajaxForm = new WH_GF_Multicolumn_Public(
			$this->get_plugin_name(), $this->get_version() );

		$ajaxForm->display();
	}

	public function scripts() {
		$scripts[] =
			array (
				'handle'    => 'gfmc-scripts-public',
				'src'       => plugins_url( '/public/js/gf-form-multicolumn.min.js',
				                            __FILE__ ),
				'version'   => $this->get_version(),
				'deps'      => array ( 'jquery', 'gform_conditional_logic' ),
				'in_footer' => true,
				'enqueue'   => array (
					array (
						'field_types' => array (
							'column_start',
							'column_break',
							'column_end',
						),
					),
				),
			);

		$scripts[] =
			array (
				'handle'  => 'gfmc-scripts-admin',
				'src'     => plugins_url( '/admin/js/gf-form-multicolumn-admin.min.js',
				                          __FILE__ ),
				'version' => $this->get_version(),
				'enqueue' => array (
					array (
						'admin_page' => array ( 'form_settings' ),
					),
				),
			);

		return array_merge( parent::scripts(), $scripts );
	}

	public function styles() {
		// Styles needs to be present in admin also for Gutenberg blocks preview
		$styles = array (
			array (
				'handle'  => 'gfmc-styles-v2',
				'src'     => plugins_url( '/public/css/gf-form-multicolumn-v2.css',
				                          __FILE__ ),
				'version' => $this->get_version(),
				'enqueue' => array (
					array (
						'field_types' => array (
							'section',
						),
					),
				),
			),
			array (
				'handle'  => 'gfmc-styles-v3',
				'src'     => plugins_url( '/public/css/gf-form-multicolumn.css',
				                          __FILE__ ),
				'version' => $this->get_version(),
				'enqueue' => array (
					array (
						'field_types' => array (
							'column_start',
							'column_break',
							'column_end',
						),
					),
				),
			),
		);

		return array_merge( parent::styles(), $styles );
	}

	public function enqueue_admin_preview_scripts( $styles, $form ) {
		wp_register_style( 'preview_stylesheet',
		                   plugins_url( '/public/css/gf-form-multicolumn.css',
		                                __FILE__ ), array (), $this->_version );

		return array ( 'preview_stylesheet' );

	}

	public function set_locale() {
		$plugin_i18n = new WH_GF_Multicolumn_i18n();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_version() {
		return $this->_version;
	}
}
