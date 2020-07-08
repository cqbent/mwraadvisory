(function($) {
	console.log('this script was loaded');
	$(document).on('gform_page_loaded', function(event, form_id, current_page) {
		console.log('on page: '+current_page);
		if (current_page === '4') {
			console.log('this is page 4');
			var water_unit_type = $('[name="input_274"]').val();
			var sewer_unit_type = $('[name="input_275"]').val();
			gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {
				if (action === 'hide') {
					if ($('input[name="input_165.1"]').prop('checked')) {
						water_unit_type = $('[name="input_171"]').val();
						var water_min_fee = $('[name="input_60"]').val();
						var water_min_fee_usage = $('[name="input_173"]').val();
						if (water_min_fee_usage) {
							$('.gfield_list_54_cell1 input:first, .gfield_list_183_cell1 input:first, .gfield_list_186_cell1 input:first').val(0).attr('readonly', 'readonly');
							$('.gfield_list_54_cell2 input:first, .gfield_list_183_cell2 input:first, .gfield_list_186_cell2 input:first').val(water_min_fee_usage).attr('readonly', 'readonly');
						}
						if (water_min_fee) {
							$('.gfield_list_54_cell4 input:first, .gfield_list_183_cell4 input:first, .gfield_list_186_cell4 input:first').val(water_min_fee).attr('readonly', 'readonly');
						}
					}
					if ($('input[name="input_168.1"]').prop('checked')) {
						sewer_unit_type = $('[name="input_172"]').val();
						var sewer_min_fee = $('[name="input_61"]').val();
						var sewer_min_fee_usage = $('[name="input_174"]').val();
						if (sewer_min_fee_usage) {
							$('.gfield_list_55_cell1 input:first, .gfield_list_184_cell1 input:first, .gfield_list_187_cell1 input:first').val(0).attr('readonly', 'readonly');
							$('.gfield_list_55_cell2 input:first, .gfield_list_184_cell2 input:first, .gfield_list_187_cell2 input:first').val(sewer_min_fee_usage).attr('readonly', 'readonly');
						}
						if (sewer_min_fee) {
							$('.gfield_list_55_cell4 input:first, .gfield_list_184_cell4 input:first, .gfield_list_187_cell4 input:first').val(sewer_min_fee).attr('readonly', 'readonly');
						}
					}
					if (sewer_unit_type) {
						$('.gfield_list_55_cell3 select option, .gfield_list_184_cell3 select option, .gfield_list_187_cell3 select option').each(function () {
							if ($(this).val() === sewer_unit_type) {
								$(this).attr('selected', 'selected');
							}
						})
						$('.gfield_list_55_cell3 select, .gfield_list_184_cell3 select, .gfield_list_187_cell3 select').attr('disabled', 'disabled').addClass('not-active');
					}
				}
			});
		}
		else if (current_page === '7') {
			if ($('[name="input_276.1"]').prop('checked')) {
				$('.commercial-water-rate-structure-fieldset').addClass('hidden');
			}
			if ($('[name="input_277.1"]').prop('checked')) {
				$('.commercial-sewer-rate-structure-fieldset').addClass('hidden');
			}
		}
	})
})(jQuery);
