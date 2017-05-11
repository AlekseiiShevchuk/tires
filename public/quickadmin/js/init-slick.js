$(document).ready(function() {
	// $('.product-slider').slic();

	 $('.product-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.product-slider-thumb'
	});

	$('.product-slider-thumb').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.product-slider',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});
});