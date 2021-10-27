$(document).ready(() => {


	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});

	var bestsellers_slider = tns({
		container: '.bestsellers__blocks-wrapper',
		controlsContainer: '.bestsellers__sliders',
		nav: true,
		navPosition: 'bottom',
		swipeAngle: false,
		rewind: false,
		arrowKeys: false,
		autoplayButtonOutput: false,
		autoplayTimeout: 10000,
		loop: true,
		autoplay: true,
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



	var rewiew_slider = tns({
		container: '.product_card__reviews-wrapper',
		controlsContainer: '.product_card__reviews__sliders',
		nav: false,
		gutter: 15,
		swipeAngle: false,
		rewind: false,
		arrowKeys: false,
		autoplayButtonOutput: false,
		autoplayTimeout: 10000,
		autoplay: true,
		gutter: 10,
		loop: true,
		speed: 1200,
		mouseDrag: true,

		responsive: {
			1: {
				items: 1,
				gutter: 5,
				mouseDrag: true
			},

			700: {
				items: 2
			},

			959: {
				items: 2
			},

			1169: {
				items: 2
			}
		}
	});




	var product_card_slider = tns({
		container: '.product_card__image-carousel__wrapper',
		controlsContainer: '.product_card__image-arrow',
		nav: false,
		mouseDrag: true,
		swipeAngle: false,
		arrowKeys: false,
		rewind: false,
		loop: true,
		autoplayButtonOutput: false,
		speed: 400,

		responsive: {
			300: {
				items: 2
			},

			413: {
				items: 3
			},

			568: {
				items: 4
			},

			637: {
				items: 4
			},

			767: {
				items: 5
			},

			813: {
				items: 3
			},

			960: {
				items: 4
			},

			1024: {
				items: 4
			},

			1025: {
				items: 4
			}
		}
	});





	$('.product_card__image-wrapper').on('click', (event) => {

		$('.product_card__image-wrapper').each((index, item) => {
			$(item).removeClass('product_card__image-active');
		});


		var clickedImg = $(event.currentTarget).find('.product_card__image').attr('src');
		$('.product_card__big-image').css('background-image', `url(${clickedImg})`);


		$(event.currentTarget).toggleClass('product_card__image-active');

	});


	$('.products-card__characts-open').each(function (index, item) {
		$(item).prop('checked', false);
	});



	$('.products-card__other-all').on('click', (event) => {

		if ($('.products-card__other-all-size').hasClass('size_hide')) {
			$('.products-card__other-all-size').removeClass('size_hide');
			$(event.currentTarget).text('Скрыть все размеры');
		} else {
			$('.products-card__other-all-size').toggleClass('size_hide');
			$(event.currentTarget).text('Показать все размеры');
		}

	});



	$('.bestsellers__block-circle-button-favorite').on('click', (event) => {

		$(event.currentTarget).hasClass('active') ? $(event.currentTarget).removeClass('active') : $(event.currentTarget).toggleClass('active');

	});


});
