<?php

/*
 * Main rate calculator class
 */

class RateCalculatorDisplay
{
	/*
	 * set variables
	 */
	public $usage_amount = '';
	public $error_msg = '';
	public $community = '';
	public $community_list = '';
	public $year_list = '';
	public $year = '';
	public $state = '';
	public $usage_frequency = 1;
	public $unit_type = 'KGAL';
	public $service_type = 'water';
	public $frequency_array = ['Annually' => 1, 'Semi-Annualy' => 2, 'Triannully' => 3, 'Quarterly' => 4, 'Monthly' => 12, 'Daily' => 365];
	public $fee = 0;
	public $fee_month = 0;
	public $fee_year = 0;

	/*
	 * construct class
	 */
	function __construct()
	{
		add_action('wp_ajax_get_rate_survey_communities', array($this, 'get_rate_survey_communities'));
		add_action('wp_ajax_nopriv_get_rate_survey_communities', array($this, 'get_rate_survey_communities'));
		add_action('admin_post_rc_form', array($this, 'process_rcform'));
		add_action('admin_post_nopriv_rc_form', array($this, 'process_rcform'));
		//add_action('wp_ajax_calculate_data', array($this, 'calculate_data'));
		//add_action('wp_ajax_no_priv_calculate_data', array($this, 'calculate_data'));
		add_shortcode('rate_calculator', array($this, 'ratecalculator_load'));
		//$this->ratecalculator_load();
	}

	function load_assets()
	{
		// load styles, custom js, ????

		wp_enqueue_style('rc-style', plugin_dir_url(dirname(__FILE__)) . 'assets/css/rc.css');
		wp_enqueue_script('rc-script', plugin_dir_url(dirname(__FILE__)) . 'assets/js/rc_compiled.js', array('jquery'), '', 'true');
		wp_localize_script('rc-script', 'rc_ajax_obj', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'option_value' => 'this val'
		));
	}

	function ratecalculator_load()
	{
		$this->load_assets();
		$this->process_rcform();
		$this->year_list = $this->year_list();
		$form = '';
		// get communities and load template
		require(plugin_dir_path(dirname(__FILE__)) . 'includes/rc-page.php');
		//require_once plugin_dir_path( __FILE__ ) . 'includes/rc-page.php';
		return $form;

	}

	/*
	 * Get survey data from Rate Survey posts
	 */
	function get_communities($noprint = FALSE)
	{
		// return all communities based on state and year
		error_log('get communities was called');
		$args = array(
			'post_type' => 'cpt-community',
			'numberposts' => -1,
			'post_status' => 'publish',
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$posts = get_posts($args);
		$choices = array();
		$result = '';
		foreach ($posts as $post) {
			$selected = '';
			$choices[] = array('text' => $post->post_title, 'value' => $post->post_title);
			if ($_REQUEST['rc_community'] == $post->post_title) {
				$selected = ' selected';
			}
			$result .= '<option value="' . $post->post_title . '" ' . $selected . '>' . $post->post_title . '</option>';
		}
		//wp_send_json($choices);
		if ($noprint == FALSE) {
			print $result;
		} else {
			return $result;
		}

	}

	function get_rate_survey_communities($year, $noprint = FALSE) {
		$communities = [];
		$result = '';
		$args = [
			'post_type' => 'rate_survey',
			'numberposts' => -1,
			'post_status' => 'publish',
			'meta_key' => 'year',
			'meta_value' => $year
		];
		$query = new WP_Query($args);
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$community = get_field('community');
				$communities[$community->ID] = $community->post_title;
			}
			wp_reset_postdata();
		}
		asort($communities);
		//var_dump($communities);
		foreach ($communities as $key => $value) {
			if ($_REQUEST['rc_community'] == $key) {
				$selected = ' selected';
			}
			$result .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
			$selected = '';
		}
		if ($noprint == FALSE) {
			print $result;
		} else {
			return $result;
		}
	}

	function year_list()
	{
		$year_array = ['', 2020];
		$year_list = '';
		for ($i = 0; $i < count($year_array); $i++) {
			$selected = '';
			if ($_REQUEST['rc_year'] == $year_array[$i]) {
				$selected = ' selected';
			}
			$year_list .= '<option value="' . $year_array[$i] . '" ' . $selected . '>' . $year_array[$i] . '</option>';
		}
		return $year_list;
	}

	function process_rcform()
	{
		// process the rc field data
		$this->usage_amount = (int)$_REQUEST['usage_amount'];
		$this->community = $_REQUEST['rc_community'];
		$this->year = $_REQUEST['rc_year'];
		$this->state = $_REQUEST['rc_state'];
		$this->usage_frequency = (int)$_REQUEST['usage_frequency'];
		$this->unit_type = $_REQUEST['unit_type'];
		$this->service_type = $_REQUEST['service_type'] ? $_REQUEST['service_type'] : 'water';
		// validate form and then process
		if ($_REQUEST['action'] == 'rc_form') {
			if (!$_REQUEST['rc_year']) {
				$this->error_msg .= 'Error: No year selected';
			}
			elseif (!$this->usage_amount || $this->usage_amount == 0) {
				$this->error_msg .= 'Error: No usage amount entered';
			}
			else {
				$this->community_list = $this->get_rate_survey_communities($this->year, TRUE);
				$this->calculate_data($this->community, $this->year);
				//$this->get_rate_survey_data(1245, '2020');
				//$this->get_rate_survey_communities('2020');
			}
		}
	}

	function get_survey_entries($form_id, $community, $year)
	{
		$search_criteria = array(
			//'is_approved' =>	'1',
			'status' => 'active',
			'field_filters' => array(
				array(
					'key' => '337',
					'value' => $community
				),
				array(
					'key' => '152',
					'value' => $year
				)
			)
		);
		$result = GFAPI::get_entries($form_id, $search_criteria);
		// unserialize water and sewer rate tables
		//$result[0][54] = unserialize($result[0][54]);
		//$result[0][55] = unserialize($result[0][55]);
		$result[0][161] = unserialize($result[0][161]);
		$result[0][162] = unserialize($result[0][162]);
		$result[0][183] = unserialize($result[0][183]);
		$result[0][184] = unserialize($result[0][184]);
		$result[0][186] = unserialize($result[0][186]);
		$result[0][187] = unserialize($result[0][187]);

		// set survey_data array
		$survey_data = [
			'water_rate_table' => unserialize($result[0][54]),
			'sewer_rate_table' => unserialize($result[0][55]),
			'unit_type_water' => $result[0][274],
			'unit_type_sewer' => $result[0][275],
			'water_billing_frequency' => $result[0][50],
			'sewer_billing_frequency' => $result[0][51],
			'water_base_fee' => $result[0][166],
			'sewer_base_fee' => $result[0][275],
			'water_minimum_fee_include_amount' => $result[0][60],
			'sewer_minimum_fee_include_amount' => $result[0][61]
		];
		return $survey_data;
	}

	function get_rate_survey_data($community, $year)
	{
		$survey_data = [];
		$args = array(
			'post_type' => 'rate_survey',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'year',
					'value' => $year,
					'compare' => '='
				),
				array(
					'key' => 'community',
					'value' => $community,
					'compare' => '='
				)
			)
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$survey_data['unit_type_water'] = get_field('water_unit_type');
				$survey_data['unit_type_sewer'] = get_field('sewer_unit_type');
				$survey_data['water_billing_frequency'] = get_field('water_billing_frequency');
				$survey_data['sewer_billing_frequency'] = get_field('sewer_billing_frequency');
				$survey_data['water_base_fee'] = get_field('water_base_fee');
				$survey_data['sewer_base_fee'] = get_field('sewer_base_fee');
				$survey_data['water_minimum_fee_include_amount'] = get_field('water_minimum_fee');
				$survey_data['sewer_minimum_fee_include_amount'] = get_field('sewer_minimum_fee');
				$survey_data['water_rate_table'] = get_field('water_rate_table');
				$survey_data['sewer_rate_table'] = get_field('sewer_rate_table');
				/*
				if (have_rows('water_rate_table')) {
					$count_water = 0;
					while (have_rows('water_rate_table')) {
						$survey_data['water_rate_table'][$count_water] = [
							'Tier Start' => get_sub_field('tier_start'),
							'Tier End' => get_sub_field('tier_start'),
							'Rate' => get_sub_field('rate')
						];
						$count_water++;
					}
				}
				if (have_rows('sewer_rate_table')) {
					$count_sewer = 0;
					while (have_rows('sewer_rate_table')) {
						$survey_data['sewer_rate_table'][$count_sewer] = [
							'Tier Start' => get_sub_field('tier_start'),
							'Tier End' => get_sub_field('tier_start'),
							'Rate' => get_sub_field('rate')
						];
						$count_sewer++;
					}
				}
				*/
			}
			wp_reset_postdata();
		}
		//var_dump($survey_data);
		return $survey_data;
	}

	function survey_entries_json($community, $year)
	{
		// get community data: rate table, billing frequency, base fee, min charge, unit type
		// get survey entry data
		$result = $this->get_survey_entries('66', $community, $year);
		// unserialize water and sewer rate tables
		$result[0][54] = json_encode($result[0][54]);
		$result[0][55] = json_encode($result[0][55]);
		$result[0][161] = json_encode($result[0][161]);
		$result[0][162] = json_encode($result[0][162]);
		$result[0][183] = json_encode($result[0][183]);
		$result[0][184] = json_encode($result[0][184]);
		$result[0][186] = json_encode($result[0][186]);
		$result[0][187] = json_encode($result[0][187]);

		print json_encode($result[0]);
	}

	function calculate_data($community, $year) {
		// get survey entries
		//$result = $this->get_survey_entries('66', $community, $year);
		$result = $this->get_rate_survey_data($community, $year);
		//var_dump($result);
		// set initial variables
		$fee_water = 0;
		$fee_sewer = 0;
		$usage = $this->usage_amount;
		// adjust usage based on selected unit type vs community unit type
		$usage_water = $this->calculate_usage($usage, $this->unit_type, $result['unit_type_water']);
		$usage_sewer = $this->calculate_usage($usage, $this->unit_type, $result['unit_type_sewer']);
		// set calculated frequency based on frequency selected / community frequency if they are different
		//$calculated_frequency_water = $this->calculate_frequency($this->usage_frequency, $this->frequency_array[$result['water_billing_frequency']]);
		//$calculated_frequency_sewer = $this->calculate_frequency($this->usage_frequency, $this->frequency_array[$result['sewer_billing_frequency']]);
		$calculated_frequency_water = $this->calculate_frequency($this->usage_frequency, $result['water_billing_frequency']);
		$calculated_frequency_sewer = $this->calculate_frequency($this->usage_frequency, $result['sewer_billing_frequency']);
		// calculate fee based on usage and rate table
		$fee_water = $this->calculate_rate_table($result['water_rate_table'], $usage_water, $calculated_frequency_water);
		$fee_sewer = $this->calculate_rate_table($result['sewer_rate_table'], $usage_sewer, $calculated_frequency_sewer);
		//$fee_water = $fee_water * $calculated_frequency_water;
		//$fee_sewer = $fee_sewer * $calculated_frequency_sewer;
		// add base fee per calculated frequency
		$fee_water += (float)$result['water_base_fee'] / $calculated_frequency_water;
		$fee_sewer += (float)$result['sewer_base_fee'] / $calculated_frequency_sewer;
		// get calculated min fee; if this number > fee then set fee to this
		$calculated_min_water_fee = (float)$result['water_minimum_fee_include_amount'] / $calculated_frequency_water;
		$calculated_min_sewer_fee = (float)$result['sewer_minimum_fee_include_amount'] / $calculated_frequency_sewer;
		if ($calculated_min_water_fee > $fee_water) {
			$fee_water = $calculated_min_water_fee;
		}
		if ($calculated_min_sewer_fee > $fee_sewer) {
			$fee_sewer = $calculated_min_sewer_fee;
		}
		// set fee based on selected service type (water, sewer, water+sewer)
		if ($this->service_type == 'water') {
			$this->fee = $fee_water;
		}
		elseif ($this->service_type == 'sewer') {
			$this->fee = $fee_sewer;
		}
		elseif ($this->service_type == 'water_sewer') {
			$this->fee = $fee_water + $fee_sewer;
		}
		// set month and annual fees
		$this->fee_month = $this->fee * $this->usage_frequency / 12;
		$this->fee_year = $this->fee_month * 12;
	}

	function calculate_rate_table($table, $usage, $frequency) {
		// calculate fee based on usage sand rate table
		$fee = 0;
		$calculated_usage = $usage * $frequency;
		foreach ($table as $item) {
			//$tier_start = (int)$item['Tier Start'];
			//$tier_end = (int)$item['Tier End'];
			$tier_start = (int)$item['tier_start'];
			$tier_end = (int)$item['tier_end'];
			$tier_range = $tier_end - $tier_start;
			if ($calculated_usage > $tier_range && $tier_range > 0) {
				//$fee += (float)$item['Rate'] * $tier_range;
				$fee += (float)$item['rate'] * $tier_range;
				$calculated_usage = $calculated_usage - $tier_range;
			}
			else {
				//$fee += (float)$item['Rate'] * $calculated_usage;
				$fee += (float)$item['rate'] * $calculated_usage;
				break;
			}
		}
		$fee = $fee / $frequency;
		return $fee;
	}

	function calculate_usage($usage, $usage_type_selected, $usage_type_community) {
		if ($usage_type_selected != $usage_type_community) {
			//var_dump($usage_type_community);
			if ($usage_type_community == 'KGAL') {
				$usage = $usage * .748; // convert hcl to kgal
			}
			else {
				$usage = $usage * 1.336; // convert kgal to hcf
			}
		}
		return $usage;
	}

	function calculate_frequency($selected_frequency, $community_frequency) {
		$calculated_frequency = 1;
		if ($selected_frequency != $community_frequency) {
			$calculated_frequency = $selected_frequency / $community_frequency;
			//$fee = $fee * $calculated_frequency;
		}
		return $calculated_frequency;
	}

	// some old stuff to delete soon
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
	 * 275 - sewer base fee
	 * 182 - billing_month_when_same_rate_year
	 * range_array, range_value_array, max_range, billing_frequency, base_fee, water_usages, additional_fee_table, sewer_water_rate_type, has_community_minimum_fee, minimum_fee_amount, minimum_fee_includes_uses
	 */
	/*
		$unit_type_water = $result[274];
		$unit_type_sewer = $result[275];
		$water_billing_frequency = $result[50];
		$sewer_billing_frequency = $result[51];
		$water_rate_table = $result[54];
		$sewer_rate_table = $result[55];
		$water_base_fee = $result[166];
		$sewer_base_fee = $result[275];
		$water_minimum_fee_include_amount = $result[60];
		$sewer_minimum_fee_include_amount = $result[61];
		$calculated_frequency = 1;
	*/

}
