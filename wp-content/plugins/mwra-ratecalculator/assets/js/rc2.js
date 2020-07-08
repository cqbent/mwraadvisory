(function ($) {
	$('#ratecalculator_formxx #rc_year').change(function() {
		console.log('changed');
		$.post(rc_ajax_obj2.ajax_url, {
				'action': 'get_communities2',
				'option_val': 'some_val'
			}, function(response) {
				// do something here
				console.log(response);
			}
		)
	})
})(jQuery);
