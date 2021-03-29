import 'rangeslider.js';
//import 'popper.js';
//import 'bootstrap';

(function ($) {
	$('[data-toggle="tooltip"]').tooltip();
	$('#ratecalculator_form #rc_year').change(function() {
		$.post(rc_ajax_obj.ajax_url, {
			'action': 'get_rate_survey_communities',
			'option_value': this.value
		}, function(response) {
				// do something here
				var list = response;
				console.log(response  );
				$('#ratecalculator_form #rc_community').html(list);
			}
		)
	});

	$('#ratecalculator_form #rc_community').change(function() {

	});

})(jQuery);
