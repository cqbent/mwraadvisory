<?php
/*
 * Survey form class
 */

class RCSurveyForm {
	/*
	 * construct function
	 */
	function __construct()
	{
		$this->rc_add_actions();
		$this->mwra_add_filters();
	}

	/*
	 * load asset files, etc.
	 */
	function load_assets() {
		wp_enqueue_style('rc-style', plugin_dir_url(dirname(__FILE__)) . 'assets/css/rc-survey-form.css');
		wp_enqueue_script('rc-survey-form', plugin_dir_url(dirname(__FILE__)) . 'assets/js/rc_survey_form.js');
	}

	/*
	 * add actions
	 */
	function rc_add_actions() {
		add_action('gform_enqueue_scripts', array($this, 'load_assets'), 10, 2);
	}

	/*
 	* add filters
 	*/
	function mwra_add_filters() {
		add_filter( 'gform_pre_render', array($this, 'populate_communities') );
		//add_filter( 'gform_pre_render', array($this, 'rc_survey_form_scripts') );
		add_filter( 'gform_pre_validation', array($this, 'populate_communities') );
		add_filter( 'gform_pre_submission_filter', array($this, 'populate_communities') );
		add_filter( 'gform_admin_pre_render', array($this, 'populate_communities') );
	}

	/*
 * custom prefill for communities form
 */
	function populate_communities( $form ) {
		foreach ( $form['fields'] as &$field ) {
			if ( $field->type != 'select' || strpos( $field->cssClass, 'community-select' ) === false ) {
				continue;
			}
			// you can add additional parameters here to alter the posts that are retrieved
			// more info: http://codex.wordpress.org/Template_Tags/get_posts
			$args = array(
				'post_type' => 'cpt-community',
				'numberposts' => -1,
				'post_status' => 'publish'
			);
			$posts = get_posts( $args );
			$choices = array();
			foreach ( $posts as $post ) {
				$choices[] = array( 'text' => $post->post_title, 'value' => $post->post_title );
			}

			// update 'Select a Post' to whatever you'd like the instructive option to be
			$field->placeholder = 'Select a Community';
			$field->choices = $choices;

		}
		return $form;
	}

	function rc_survey_form_scripts($form) {

	}
}


