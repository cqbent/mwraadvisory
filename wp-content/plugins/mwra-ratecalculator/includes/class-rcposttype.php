<?php

class SurveyPostType {
	// create survey data post type
	// store custom field config in plugin
	/*
	 * 54 - residential water rate table: "[{"Tier Start":"0","Tier End":"15","Unit":"HCF","Rate":"4.99"},]"
	 * 55 - residential sewer rate table: "[{"Tier Start":"0","Tier End":"15","Unit":"HCF","Rate":"4.99"},]"
	 * 161 - Residential Additional Water Rate Table: "[{"Fee Name":"","Please Select":"Per Year","$ Per \/ (Selection)":""}]"
	 * 162 - Residential Sewer Additional Rate Table
	 * 183 - Resdential Water Season First Rate Table
	 * 184 - Residential Sewer Season First Rate Table
	 * 186 - Residential Water Season Second Rate Table
	 * 187 - Residential Sewer Season Second Rate Table
	 * 152 - year
	 * 136 - community: cpt-community
	 * 50 - water billing frequency: [1->annually, 2->semi-annually, 3->tri-annually, 4->quarterly, 6->bi-monthly, 12->monthly, daily->136]
	 * 51 - sewer billing frequency: [1->annually, 2->semi-annually, 3->tri-annually, 4->quarterly, 6->bi-monthly, 12->monthly, daily->136]
	 * 173 - water_minimum_fee_includes_uses
	 * 174 - sewer minimum_fee_includes_uses
	 * 60 - water_minimum_fee_include_amount
	 * 61 - sewer minimum_fee_include_amount
	 * 179 - community_water_use_same_rate_year
	 * 180 - community_sewer_use_same_rate_year
	 * 166 - water base fee
	 * 182 - billing_month_when_same_rate_year
	 *
	 */

	function __construct() {
		add_action('init', array($this, 'rate_survey_post_type'));
		add_action('acf/update_field_group', array($this, 'rate_survey_update_field_group'), 1, 1);
		// Load - includes the /acf-json folder in this plugin to the places to look for ACF Local JSON files
		add_filter('acf/settings/load_json', function($paths) {
			$paths[] = RC_PLUGIN_DIRPATH . '/acf-json';
			return $paths;
		});
	}

	// register survey data post type
	function rate_survey_post_type() {
		register_post_type('rate_survey',
			array(
				'labels' => array(
					'name' => __('Rate Survey Data'),
					'singular_name' => __('Rate Survey Entry')
				),
				'public' => TRUE,
				'has_archive' => TRUE,
				'rewrite' => array('slug' => 'rate-survey', 'with_front' => FALSE),
				'hierarchical' => FALSE,
				'supports' => array(
					'title',
					'author',
					'custom-fields',
					'editor',
					'thumbnail'
				),
				'not-found' => __('Nothing was found. what to do?'),
				'menu_icon' => 'dashicons-clipboard'
			)
		);
	}

	function rate_survey_update_field_group($group) {
		// list of field groups that should be saved to my-plugin/acf-json
		$groups = array('group_6060db4a7d0b1');

		if (in_array($group['key'], $groups)) {
			add_filter('acf/settings/save_json', function() {
				return RC_PLUGIN_DIRPATH . '/acf-json';
			});
		}
	}




}
