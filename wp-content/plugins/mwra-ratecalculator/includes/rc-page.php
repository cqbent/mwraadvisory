<?php
/*
 * state, year, community, frequency, bill type (water, sewer, both), unit of measurement (kgal, hcf)
 */
$url_parsed = parse_url("//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
$url_path = $url_parsed['path'];
$frequency_list = '';
$selected_frequency = '';
foreach($this->frequency_array as $key => $value) {
	$frequency_selected = '';
	if ($_REQUEST['usage_frequency'] == $value) {
		$frequency_selected = ' selected';
		$selected_frequency = ' (' . $key . ')';
	}
	$frequency_list .= '<option value="'.$value.'" '.$frequency_selected.'>'.$key.'</option>';
}
$water_checked = '';
$sewer_checked = '';
$water_sewer_checked = '';
$service_type_name = '';
if ($this->service_type == 'water') {
	$water_checked = ' selected';
	$service_type_name = 'Water';
}
elseif ($this->service_type == 'sewer') {
	$sewer_checked = ' selected';
	$service_type_name = 'Sewer';
}
elseif ($this->service_type == 'water_sewer') {
	$water_sewer_checked = ' selected';
	$service_type_name = 'Water + Sewer';
}

$kgal_selected = '';
$hcf_selected = '';
if ($this->unit_type == '2') {
	$kgal_selected = ' selected';
}
elseif ($this->unit_type == '1') {
	$hcf_selected = ' selected';
	$service_type = 'Water + Sewer';
}
$fee = number_format($this->fee, 0);
$fee_month = number_format($this->fee_month, 0);
$fee_year = number_format($this->fee_year, 0);

$form = <<<EOT
<!-- Modal -->
<div class="ratecalculator" xmlns="http://www.w3.org/1999/html">
	<div class="error-msg">$this->error_msg</div>
	<div class="row">
		<div class="col-sm-7">
			<form id="ratecalculator_form">
				<input type="hidden" name="action" value="rc_form" />
				<div class="community-year row">
					<div class="col-12">
						<h4>Step 1: Select state, year and community</h4>
					</div>
					<fieldset class="state">
						<label>State</label>
						<select name="rc_state" id="rc_state">
							<option value="MA">Massachusetts</option>
						</select>
					</fieldset>
					<fieldset class="year">
						<label>Year</label>
						<select name="rc_year" id="rc_year">
							$this->year_list
						</select>
					</fieldset>
					<fieldset class="community">
						<label>Community</label>
						<select name="rc_community" id="rc_community">
							<!-- list goes here -->
							$this->community_list
						</select>
					</fieldset>
				</div>
				<div class="service-units row">
					<div class="col-12">
						<h4>Step 2: Choose service type, unit type and time period</h4>
					</div>
					<fieldset class="service-type">
						<label>Select service type</label>
						<select name="service_type" id="unit_type">
							<option value="water" $water_checked>Water Bill</option>
							<option value="sewer" $sewer_checked>Sewer Bill</option>
							<option value="water_sewer" $water_sewer_checked>Water + Sewer Bill</option>
						</select>
					</fieldset>
					<fieldset class="unit-type">
						<label>Units <i class="fa fa-question-circle" data-toggle="tooltip" data-html="true" title="KGAL (Kilogallons) = 1000 Gallons <br> HCF (Hundreds of Cubic Feet) = 748 Gallons"></i></label>
						<select name="unit_type" id="unit_type">
							<option value="HCF" $hcf_selected >HCF</option>
							<option value="KGAL" $kgal_selected >KGAL</option>
						</select>
					</fieldset>
					<fieldset class="usage-frequency">
						<label>Frequency</label>
						<select id="usage_frequency" name="usage_frequency">
							$frequency_list
						</select>
					</fieldset>
				</div>
				<div class="usage row">
					<div class="col-12">
						<h4>Step 3: Enter Usage amount</h4>
					</div>
					<fieldset class="usage-amount col">
						<input type="number" name="usage_amount" id="usage_amount" value="$this->usage_amount" />
					</fieldset>
				</div>
				<button type="submit" name="submit">Calculate Usage</button>
				<button><a href="$url_path">Reset</a></button>
			</form>
		</div>
		<div class="col-sm-5">
			<div class="result">
				<h3>$service_type_name Usage</h3>
				<div class="fee">
					<label>Bill $selected_frequency</label>
					<span class="amount">$$fee</span>
				</div>
				<div class="fee-month">
					<label>Monthly</label>
					<span class="amount">$$fee_month</span>
				</div>
				<div class="fee-year">
					<label>Annually</label>
					<span class="amount">$$fee_year</span>
				</div>
			</div>
		</div>
	</div>

</div>
EOT;
