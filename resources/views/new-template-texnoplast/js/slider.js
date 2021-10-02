$(document).ready(() => {
	

	var main_slider = tns({
		container: '.main-slider__wrapper',
		controls: false,
		arrowKeys: false,
		autoplayButtonOutput: false,
		items: 1,
		autoplay: true,
		loop: true,
		rewind: false,
		navContainer: '.main-slider__navigation',
		speed: 1200,

		responsive: {
			300: {
				mouseDrag: true
			}
		}
	});


	var bestsellers_slider = tns({
		container: '.bestsellers__blocks-wrapper',
		controlsContainer: '.bestsellers__sliders',
		nav: true,
		navPosition: 'bottom',
		swipeAngle: false,
		loop: true,
		arrowKeys: false,
		autoplayButtonOutput: false,
		autoplayTimeout: 10000,
		autoplay: true,
		rewind: false,
		speed: 1200,

		responsive: {
			1: {
				items: 1,
				mouseDrag: true
			},
			
			640: {
				items: 2,
				mouseDrag: true
			},

			735: {
				items: 3,
				mouseDrag: true
			},

			860: {
				items: 3
			},

			1309: {
				items: 3
			},

			1350: {
				items: 4
			}
		}
	});





	var news_slider = tns({
		container: '.main-news__blocks-slider',
		controlsContainer: '.main-news__sliders',
		nav: true,
		navPosition: 'bottom',
		arrowKeys: false,
		autoplayButtonOutput: false,
		edgePadding: 0,
		swipeAngle: false,
		gutter: 10,
		autoplay: true,
		loop: true,
		autoplayTimeout: 10000,
		speed: 1200,
		rewind: false,
		items: 1,

		responsive: {
			1: {
				mouseDrag: true
			},

			767: {
				items: 2
			},

			1169: {
				items: 3
			},

			1309: {
				items: 3
			}
		}
	});


	$('.bestsellers__block-circle-button-favorite').on('click', function () {

		$(this).toggleClass('active');

	});






	$('.bestsellers__block-button-buy').on('click', function () {

		$('#Modal').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});

	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});

});
