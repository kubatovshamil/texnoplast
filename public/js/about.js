$(document).ready(() => {


	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});


	var img_slider = tns({
		container: '.about-us__slider-wrapper',
		gutter: 10,
		navPosition: 'bottom',
		mouseDrag: true,
		loop: true,
		rewind: false,
		autoplay: true,
		controls: false,
		arrowKeys: false,
		autoplayButtonOutput: false,
		speed: 400,

		responsive: {
			1: {
				mouseDrag: true
			},

			500: {
				items: 3,
				mouseDrag: true
			},

			767: {
				items: 2,
				mouseDrag: true
			}
		}
	});



	var news_slider = tns({
		container: '.news-and-articles__blocks-wrapper',
		controlsContainer: '.news-and-articles__sliders',
		nav: false,
		gutter: 15,
		arrowKeys: false,
		loop: true,
		rewind: false,
		autoplayButtonOutput: false,
		speed: 400,

		responsive: {
			1: {
				mouseDrag: true
			},

			666: {
				items: 1,
				mouseDrag: true
			},

			767: {
				items: 2,
				mouseDrag: true
			},

			1169: {
				items: 3
			}
		}
	});





	$('.about-us__slider-item').on('click', (event) => {

		var clickedImg = $(event.currentTarget).find('.about-us__slider-img').attr('src');
		
		$('.about-us__block.about-us__img').css('background-image', `url(${clickedImg})`);

	});



});
