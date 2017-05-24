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
	  slidesToShow: 6,
	  slidesToScroll: 1,
	  asNavFor: '.product-slider',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});

	$('.main-slider').slick({
  	infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
		swipe: false,
		touchMove: false,
		dots: true,
		dotsClass: 'main-slider-dots',
		nextArrow: '<span class="tparrows tparrows--left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
  	prevArrow: '<span class="tparrows tparrows--right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>'
	});

});
