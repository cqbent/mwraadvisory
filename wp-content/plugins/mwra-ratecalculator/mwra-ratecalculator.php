<?php
/**
 * Plugin Name:     Mwra Rate Calculator
 * Plugin URI:      https://mwraadvisoryboard.com/
 * Description:     Custom rate calculator plugin for water & sewer information
 * Author:          Charles Bent
 * Text Domain:     mwra-ratecalculator
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Mwra_Ratecalculator
 */

// Your code starts here.

/*
 * load includes class file(s)
 * load asset files
 * init functions
 *
 */

/*
 * version
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );
define('RC_PLUGIN_DIRPATH', plugin_dir_path(__FILE__));

/*
 * Activate
 */
function activate_ratecalculator() {
	// do some activating
	if (!class_exists('GFForms')) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( __( 'Please install and Activate GravityForms.', 'ratecalculator' ), 'Plugin dependency check', array( 'back_link' => true ) );
	}
}

/*
 * Deactivate
 */
function deactivate_ratecalculator() {
	// do some deactivating
}

register_activation_hook( __FILE__, 'activate_ratecalculator' );
register_deactivation_hook( __FILE__, 'deactivate_ratecalculator' );


/*
 * require and load rate calculator classes
 */
require RC_PLUGIN_DIRPATH . 'includes/class-rcadmin.php';
require RC_PLUGIN_DIRPATH . 'includes/class-ratecalculator.php';
require RC_PLUGIN_DIRPATH . 'includes/class-surveyform.php';
require RC_PLUGIN_DIRPATH . 'includes/class-rcposttype.php';

$rcposttype = new SurveyPostType();
$rcform = new RCSurveyForm();
$rcadmin = new RateCalculatorAdmin();
$rcdisplay = new RateCalculatorDisplay();






