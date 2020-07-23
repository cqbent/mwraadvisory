<?php

/*
 * Main rate calculator class
 */

class RateCalculatorDisplay {
	/*
	 * set variables
	 */


	/*
	 * construct class
	 */
	function __construct()
	{
		add_action('wp_ajax_get_communities', array($this, 'get_communities'));
		add_action('wp_ajax_nopriv_get_communities', array($this, 'get_communities'));
		//add_action('wp_ajax_calculate_data', array($this, 'calculate_data'));
		//add_action('wp_ajax_no_priv_calculate_data', array($this, 'calculate_data'));
		add_shortcode('rate_calculator', array($this, 'ratecalculator_load'));
		//$this->ratecalculator_load();
	}

	function load_assets() {
		// load styles, custom js, ????

		wp_enqueue_style('rc-style', plugin_dir_url(dirname(__FILE__)) . 'assets/css/rc.css');
		wp_enqueue_script('rc-script', plugin_dir_url(dirname(__FILE__)) . 'assets/js/rc.js', array('jquery'), '', 'true');
		wp_localize_script('rc-script', 'rc_ajax_obj', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'option_value' => 'this val'
		));
	}

	function ratecalculator_load() {
		$this->load_assets();
		$form = '';
		// get communities and load template
		require (plugin_dir_path(dirname(__FILE__)) . 'includes/rc-page.php');
		//require_once plugin_dir_path( __FILE__ ) . 'includes/rc-page.php';
		return $form;

	}

	function get_form_entries() {

	}

	function get_communities() {
		// return all communities based on state and year
		error_log('get communities was called');
		$args = array(
			'post_type' => 'cpt-community',
			'numberposts' => -1,
			'post_status' => 'publish',
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$posts = get_posts( $args );
		$choices = array();
		$result = '';
		foreach ( $posts as $post ) {
			$choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
			$result .= '<option value="' . $post->post_title . '">' . $post->post_title .'</option>';
		}
		//wp_send_json($choices);
		print $result;
	}

	function calculate_data() {

	}






}
