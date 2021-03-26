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
	public $frequency_array = ['Annually' => 1, 'Semi-Annualy' => 2, 'Triannully' => 3, 'Quarterly' => 4, 'Monthly' => 12, 'Daily' => 136];
	public $fee = 0;
	public $fee_month = 0;
	public $fee_year = 0;

	/*
	 * construct class
	 */
	function __construct()
	{
		add_action('wp_ajax_get_communities', array($this, 'get_communities'));
		add_action('wp_ajax_nopriv_get_communities', array($this, 'get_communities'));
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

	function get_form_entries()
	{

	}

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

	function year_list()
	{
		$year_array = ['', 2019, 2020];
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
				$this->community_list = $this->get_communities(TRUE);
				$this->calculate_data($this->community, $this->year);
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
		$result[0][54] = unserialize($result[0][54]);
		$result[0][55] = unserialize($result[0][55]);
		$result[0][161] = unserialize($result[0][161]);
		$result[0][162] = unserialize($result[0][162]);
		$result[0][183] = unserialize($result[0][183]);
		$result[0][184] = unserialize($result[0][184]);
		$result[0][186] = unserialize($result[0][186]);
		$result[0][187] = unserialize($result[0][187]);


		return $result[0];
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
		$result = $this->get_survey_entries('66', $community, $year);
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

		// water/sewer usage * frequency (annually, etc.) * kgal conversion - ex: 100 * 1 * 1
		// rate table iteration - if usage < tier end then calculate tier rate * usage within range; reduce usage by range for next iteration
		// add base fee
		// set min fee if calculated fee is below this fee
		$fee_water = 0;
		$fee_sewer = 0;
		$usage = $this->usage_amount;
		// adjust usage based on selected unit type vs community unit type
		$usage_water = $this->calculate_usage($usage, $this->unit_type, $unit_type_water);
		$usage_sewer = $this->calculate_usage($usage, $this->unit_type, $unit_type_sewer);
		// calculate fee based on usage and rate table
		$fee_water = $this->calculate_rate_table($water_rate_table, $usage_water);
		$fee_sewer = $this->calculate_rate_table($sewer_rate_table, $usage_sewer);
		// set calculated frequency based on frequency selected / community frequency if they are different
		$calculated_frequency_water = $this->calculate_frequency($this->usage_frequency, $this->frequency_array[$water_billing_frequency]);
		$calculated_frequency_sewer = $this->calculate_frequency($this->usage_frequency, $this->frequency_array[$sewer_billing_frequency]);
		$fee_water = $fee_water * $calculated_frequency_water;
		$fee_sewer = $fee_sewer * $calculated_frequency_sewer;
		// add base fee per calculated frequency
		$fee_water += (float)$water_base_fee / $calculated_frequency_water;
		$fee_sewer += (float)$sewer_base_fee / $calculated_frequency_sewer;
		// get calculated min fee; if this number > fee then set fee to this
		$calculated_min_water_fee = (float)$water_minimum_fee_include_amount / $calculated_frequency_water;
		$calculated_min_sewer_fee = (float)$sewer_minimum_fee_include_amount / $calculated_frequency_sewer;
		if ($calculated_min_water_fee > $fee_water) {
			$fee = $calculated_min_water_fee;
		}
		if ($calculated_min_sewer_fee > $fee_sewer) {
			$fee_sewer = $calculated_min_sewer_fee;
		}
		// set fee based on selected service type (water, sewer, water+sewer)
		if ($this->service_type == 'water') {
			$this->fee = round($fee_water);
		}
		elseif ($this->service_type == 'sewer') {
			$this->fee = round($fee_sewer);
		}
		elseif ($this->service_type == 'water_sewer') {
			$this->fee = round($fee_water + $fee_sewer);
		}
		// set month and annual fees
		$this->fee_month = number_format(round($this->fee * $this->usage_frequency / 12));
		$this->fee_year = number_format(round($this->fee_month * 12));
		$this->fee = number_format($this->fee);

	}

	function calculate_rate_table($table, $usage) {
		// calculate fee based on usage sand rate table
		$fee = 0;
		foreach ($table as $item) {
			$tier_start = (int)$item['Tier Start'];
			$tier_end = (int)$item['Tier End'];
			$tier_range = $tier_end - $tier_start;
			if ($usage > $tier_range && $tier_range > 0) {
				$fee += (float)$item['Rate'] * $tier_range;
				$usage = $usage - $tier_range;
			}
			else {
				$fee += (float)$item['Rate'] * $usage;
				break;
			}
		}
		return $fee;
	}

	function calculate_usage($usage, $usage_type_selected, $usage_type_community) {
		if ($usage_type_selected != $usage_type_community) {
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

}
