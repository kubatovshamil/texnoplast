$(document).ready(() => {


	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});


	$('.contacts__address-wrapper').css('display', 'block');


	var news_slider = tns({
		container: '.contacts__address-wrapper',
		controlsContainer: '.news-and-articles__sliders',
		nav: false,
		arrowKeys: false,
		autoplayButtonOutput: false,
		autoplay: true,
		autoplayTimeout: 10000,
		items: 1,
		loop: true,
		rewind: false,
		mouseDrag: true,
		speed: 400
	});

});
