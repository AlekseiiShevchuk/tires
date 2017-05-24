$(document)
	.on('dblclick', '.get-select-option', function (e) {
		var item = $(this);
		$(document).find('.change-order-status').hide();
		$(document).find('.hide-select-option').hide();
		$(document).find('.get-select-option').show();
		$(document).find('span[data-order="' + item.attr('data-order') + '"]').hide();
		$(document).find('select[data-order="' + item.attr('data-order') + '"]').show();
		$(document).find('a[data-order="' + item.attr('data-order') + '"]').show();
	})
	.on('click', '.hide-select-option', function () {
		var item = $(this);
		$(document).find('span[data-order="' + item.attr('data-order') + '"]').show();
		$(document).find('select[data-order="' + item.attr('data-order') + '"]').hide();
		$(document).find('a[data-order="' + item.attr('data-order') + '"]').hide();
	})
	.on('change', '.change-order-status', function () {
		var item = $(this);
		var data = {
			status: item.val(),
			id: item.attr('data-order'),
			version: item.attr('data-version')
		};

		$.ajax({
			url: '/update-order-status',
			method: 'POST',
			data: data,
			headers: {
                'X-CSRF-TOKEN': window._token
            },
            success: function (data) {
            	if (data.response_status) {
            		if (data.response_version == 1) {
            			$(document).find('span[data-order="' + data.response_id + '"]')
            				.show()
            				.html(data.status_label);
						$(document).find('select[data-order="' + data.response_id + '"]').hide();
						$(document).find('a[data-order="' + data.response_id + '"]').hide();
            		} else {
            			$('#order-label-status').html(data.status_label);
            		}
            	}
            }
		});
	})
;	