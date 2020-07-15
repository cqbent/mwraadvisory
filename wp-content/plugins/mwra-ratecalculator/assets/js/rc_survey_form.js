(function($) {
	console.log('this script was loaded 2');
	$(document).on('gform_page_loaded', function(event, form_id, current_page) {
		// hide sewer (or water) fields throughout if "does your cummunity offer..." is negative
		if ($('form').hasClass('mwra-rate-survey')) {
			var water_offered = $('[name="input_157"]:checked').val();
			var sewer_offered = $('[name="input_158"]:checked').val();
			if (water_offered === '0') {
				$('fieldset.fieldset-water').addClass('hidden');
			}
			if (sewer_offered === '0') {
				$('fieldset.fieldset-sewer').addClass('hidden');
			}
			if (current_page === '4') {
				var water_unit_type = $('[name="input_274"]').val();
				var sewer_unit_type = $('[name="input_275"]').val();

				/*
				Pre fill water/sewer rate table based on _unit_type, _min_fee and _min_fee_usage fields from prev page
				 */
				gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {
					if (action === 'show') {
						if ($('input[name="input_165.1"]').prop('checked')) {
							var wtarget = $(targetId);
							if (wtarget.hasClass('water-rate-table')) {
								console.log(wtarget);
								water_unit_type = $('[name="input_171"]').val();
								var water_min_fee = $('[name="input_60"]').val();
								var water_min_fee_usage = $('[name="input_173"]').val();
								if (water_min_fee_usage) {
									wtarget.find('tr:first-child td:nth-child(1) input').val(0);
									wtarget.find('tr:first-child td:nth-child(2) input').val(water_min_fee_usage);
								}
								if (water_min_fee) {
									wtarget.find('tr:first-child td:nth-child(4) input').val(water_min_fee);
								}
								if (water_unit_type) {
									wtarget.find('tr:first-child td:nth-child(3) select option[value='+water_unit_type+']').prop('selected',  true);
								}
							}
						}
						if ($('input[name="input_168.1"]').prop('checked')) {
							var starget = $(targetId);
							if (starget.hasClass('sewer-rate-table')) {
								sewer_unit_type = $('[name="input_172"]').val();
								var sewer_min_fee = $('[name="input_61"]').val();
								var sewer_min_fee_usage = $('[name="input_174"]').val();
								if (sewer_min_fee_usage) {
									starget.find('tr:first-child td:nth-child(1) input').val(0);
									starget.find('tr:first-child td:nth-child(2) input').val(sewer_min_fee_usage);
								}
								if (sewer_min_fee) {
									starget.find('tr:first-child td:nth-child(4) input').val(sewer_min_fee);
								}
								if (sewer_unit_type) {
									starget.find('tr:first-child td:nth-child(3) select option[value='+sewer_unit_type+']').prop('selected',  true);
								}
							}
						}
					}
				});
				/*
				On adding new water/sewer table rate row, set tier start to tier end from prev row +1 and set _unit_type
				 */
				gform.addAction( 'gform_list_post_item_add', function ( item, container ) {
					// container get row count; get tier end val of previous row; add +1 and add to tier start in latest column
					var listrowcount = container.find('tbody tr').length;
					var prevrow = listrowcount - 1;
					var lastrowitemval = container.find('tbody tr:nth-child('+ prevrow +') td:nth-child(2) input').val();
					var newval = Number(lastrowitemval) + 1;
					var parentfield = container.parent().parent();
					//container.find('tbody tr:nth-child('+ listrowcount +') td:nth-child(1) input').val(newval);
					item.find('td:nth-child(1) input').val(newval);
					if (parentfield.hasClass('water-rate-table') && water_unit_type) {
						var remove_unit_type = water_unit_type === '1' ? '2' : '1';
						item.find( 'select option[value="'+remove_unit_type+'"]').remove();
						console.log('selected x')
					}
					console.log(item);
				} );

				// old action stuff - keeping for now
				/*
				gform.addAction('gform_post_conditional_logic_field_action', function (formId, action, targetId, defaultValues, isInit) {
					if (action === 'hide') {
						console.log(targetId);
						if ($('input[name="input_165.1"]').prop('checked')) {
							water_unit_type = $('[name="input_171"]').val();
							var water_min_fee = $('[name="input_60"]').val();
							var water_min_fee_usage = $('[name="input_173"]').val();
							if (water_min_fee_usage) {
								$('.gfield_list_54_cell1 input:first, .gfield_list_183_cell1 input:first, .gfield_list_186_cell1 input:first').val(0);
								$('.gfield_list_54_cell2 input:first, .gfield_list_183_cell2 input:first, .gfield_list_186_cell2 input:first').val(water_min_fee_usage);
							}
							if (water_min_fee) {
								$('.gfield_list_54_cell4 input:first, .gfield_list_183_cell4 input:first, .gfield_list_186_cell4 input:first').val(water_min_fee);
							}
						}
						if ($('input[name="input_168.1"]').prop('checked')) {
							sewer_unit_type = $('[name="input_172"]').val();
							var sewer_min_fee = $('[name="input_61"]').val();
							var sewer_min_fee_usage = $('[name="input_174"]').val();
							if (sewer_min_fee_usage) {
								$('.gfield_list_55_cell1 input:first, .gfield_list_184_cell1 input:first, .gfield_list_187_cell1 input:first').val(0);
								$('.gfield_list_55_cell2 input:first, .gfield_list_184_cell2 input:first, .gfield_list_187_cell2 input:first').val(sewer_min_fee_usage);
							}
							if (sewer_min_fee) {
								$('.gfield_list_55_cell4 input:first, .gfield_list_184_cell4 input:first, .gfield_list_187_cell4 input:first').val(sewer_min_fee);
							}
						}
						if (water_unit_type) {
							$('.gfield_list_54_cell3 select option[value='+water_unit_type+'], .gfield_list_183_cell3 select option[value='+water_unit_type+'], .gfield_list_186_cell3 select option[value='+water_unit_type+']').prop('selected',  true);
							//$('.gfield_list_54_cell3 select, .gfield_list_183_cell3 select, .gfield_list_186_cell3 select').attr('disabled', 'disabled').addClass('not-active');
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

				 */
			}
			else if (current_page === '7') {
				if ($('[name="input_276.1"]').prop('checked')) {
					$('.commercial-water-rate-structure-fieldset').addClass('hidden');
				}
				if ($('[name="input_277.1"]').prop('checked')) {
					$('.commercial-sewer-rate-structure-fieldset').addClass('hidden');
				}
			}
		}
	})
})(jQuery);
