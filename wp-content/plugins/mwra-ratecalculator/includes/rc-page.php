<?php
$form = '
<div class="ratecalculator">
	<form id="ratecalculator_form">
		<div class="community-year row">
			<fieldset class="state col-sm-3">
				<label>State</label>
				<select name="rc_state" id="rc_state">
					<option value="MA">Massachusetts</option>
				</select>
			</fieldset>
			<fieldset class="year col-sm-3">
				<label>Year</label>
				<select name="rc_year" id="rc_year">
					<option value="">Select</option>
					<option value="2019">2019</option>
				</select>
			</fieldset>
			<fieldset class="community col-sm-6">
				<label>Community</label>
				<select name="rc_community" id="rc_community">
					<!-- list goes here -->
				</select>
			</fieldset>
		</div>
	</form>
</div>
';
?>
