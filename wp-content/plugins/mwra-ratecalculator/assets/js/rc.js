(function ($) {
	$('#ratecalculator_form #rc_year').change(function() {
		$.post(rc_ajax_obj.ajax_url, {
			'action': 'get_communities',
			'value': this.value
		}, function(response) {
			// do something here
			var list = response;
			console.log(response[0].text);
			$('#ratecalculator_form #rc_community').html(list);
			}
		)
	});

	$('#ratecalculator_form #rc_community').change(function() {

	});

})(jQuery);
