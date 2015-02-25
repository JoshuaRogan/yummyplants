$(document).ready(function () {
	  $('.bxslider').bxSlider();

	  $('#bxslider-nav').bxSlider({
	  		minSlides: 3,
			maxSlides: 10,
			moveSlides: 1,
			slideWidth: 100,
			slideMargin: 10,
			pager: false, 
			controls: false, 
			auto: true, 
			speed: 1000
	  });

});


