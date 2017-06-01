$(document)
	.ready(function() {
	  $('#btn-confirm-form').attr('disabled', 1);
	})
	.on('change', '.checkbox-confirmation', function () {
		var item = $(this);
		var disabled = (item.val() == 0) ? false : true;
		var value = (item.val() == 0) ? 1 : 0;
		$(document).find('#btn-confirm-form').attr('disabled', disabled);
		item.val(value);
	})
;
