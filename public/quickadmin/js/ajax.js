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
	.on('click', '.add-to-pre-order', function () {
		var item = $(this);
		var data = {
			tire: item.attr('data-tire'),
			version: item.attr('data-version')
		};

		$.ajax({
			url: '/add-to-pre-order',
			method: 'POST',
			data: data,
			headers: {
                'X-CSRF-TOKEN': window._token
            },
            success: function (data) {
            	if (data.response_status) {
            		if (data.response_version == 1) {
	            		if (data.isRepeated) {
	            			var counter = $(document)
	            				.find('span[data-tirecounter="' + data.tire.id + '"]')
	            				.html();

	            			counter = parseInt(counter);

	            			$(document)
	            				.find('span[data-tirecounter="' + data.tire.id + '"]')
	            				.html(++counter);		
	            		} else {
	            			var src = '/uploads/thumb/' + data.tire.image_1;
	            			$('.shopping-cart-dropdown').prepend(
	            				'<div class="cart-block" data-tireremove="' + data.tire.id +'">'
	            				+ '<img src="' + src +'">'	     
	            				+ '<span data-tirecounter="' + data.tire.id + '">'
	            				+ '1'
	            				+ '</span>'
	            				+ '<span data-tireremove="' + data.tire.id +'" data-preorderremove="' + data.pre_order.id +'" class="cart-tire-remove" style="cursor: pointer;">'
	            				+ 'x'
	            				+ '</span>'
	            				+ '<span class="add-to-pre-order" data-version="1" data-tire="' + data.tire.id +'" style="cursor: pointer; margin-left: 5px;">'
	            				+ '+'
	            				+ '</span>'
	            				+ '</div>'
	            			);
	            		}

	            		if (!$('#cart-form').length) {
	            			$('.shopping-cart-dropdown').append(
	            				'<form method="POST" action="/order-redirect" accept-charset="UTF-8" id="cart-form">'
	            				+ '<input type="hidden" name="_token" value="' + window._token +'">'
	            				+ '<input type="hidden" id="cart-price" name="price" value="0">'
	            				+ '<input type="hidden" id="cart-order" name="pre_order" value="' + data.pre_order.id +'">'
	            				+ '<input type="submit" class="btn btn-danger" value="Save">'
	            				+ '</form>'
	            			);

            			$(document)
            				.find('span[data-tirecounter="' + data.tire.id + '"]')
            				.html(++counter);
            		} else {
            			var src = '/uploads/thumb/' + data.tire.image_1;
            			$('.shopping-cart-dropdown').prepend(
            				'<div class="cart-block" data-tireremove="' + data.tire.id +'">'
											+ '<div class="cart-block__image">'
	            					+ '<img src="' + src +'">'
	            				+ '</div>'
	            				+ '<div class="cart-block__info" data>'
		            				+ '<span data-tirecounter="' + data.tire.id + '">'
		            					+ '1'
		            				+ '</span>'
	            				+ '</div>'
											+ '<span data-tireremove="' + data.tire.id +'" data-preorderremove="' + data.pre_order.id +'" class="glyphicon glyphicon-remove cart-tire-remove"></span>'
            				+ '</div>'
										+ '</div>'
            			);
            		}

            		if (!$('#cart-form').length) {
            			$('.shopping-cart-dropdown').append(
            				'<form method="POST" action="/order" accept-charset="UTF-8" id="cart-form">'
            				+ '<input type="hidden" name="_token" value="' + window._token +'">'
            				+ '<input type="hidden" id="cart-price" name="price" value="0">'
            				+ '<input type="hidden" id="cart-order" name="pre_order" value="' + data.pre_order.id +'">'
										+	'<div class="cart-block__buttons">'
            					+ '<input type="submit" class="btn btn-success btn-lg" value="Til betaling">'
										+ '</div>'
            				+ '</form>'
            			);

	            			$(document).find('#cart-form').prepend(
	            				'<div id="cart-hidden-inputs"></div>'
	            			);
	            		}

	            		var price = $(document)
	            			.find('#cart-price')
	            			.val();

	            		price = parseInt(price) + parseInt(data.tire.price);

	            		$(document)
	            			.find('#cart-price')
	            			.val(price);

	            		$(document).find('#cart-hidden-inputs').append(
	            			'<input type="hidden" name="tires[]" value="' + data.tire.id +'">'
	            		);
            		} else {
            			$(document)
            				.find('#glyph')
            				.removeClass('glyphicon-shopping-cart')
            				.addClass('glyphicon glyphicon-ok');
            		}
            	}
            }
		});
	})
	.on('click', '.cart-tire-remove', function () {
		var item = $(this);
		var data = {
			tire: item.attr('data-tireremove'),
			pre_order: item.attr('data-preorderremove')
		};

		$.ajax({
			url: '/remove-from-pre-order',
			method: 'POST',
			data: data,
			headers: {
                'X-CSRF-TOKEN': window._token
            },
            success: function (data) {
            	if (data.response_status) {
            		$(document)
            			.find('div[data-tireremove="' + data.tire + '"]')
            			.remove();

            		$(document)
            			.find('input[value="' + data.tire + '"]')
            			.remove();

            		var price = $(document)
            			.find('#cart-price')
            			.val();

            		price = parseInt(price) - parseInt(data.price);

            		$(document)
            			.find('#cart-price')
            			.val(price);

            		if (data.isLastTire) {
            			$(document).find('.shopping-cart-dropdown').empty();
            		}
            	}
            }
		});
	})
;
