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
		loop: true,
		rewind: false,
		swipeAngle: false,
		arrowKeys: false,
		autoplayButtonOutput: false,
		autoplayTimeout: 10000,
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
				items: 2,
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


	$('.personal-account__nav-link').on('click', (event) => {

		var toggleID = $(event.currentTarget).attr('data-toggle');


		$('.personal-account__tab').each((index, item) => {
			$(item).removeClass('personal-account__tab-active');
		});

		$('.personal-account__nav-link').each((index, item) => {
			$(item).removeClass('personal-account__nav-link-active');
		});


		$(event.currentTarget).toggleClass('personal-account__nav-link-active');
		$(`#${toggleID}`).toggleClass('personal-account__tab-active');

	});




	$('.personal-account__order').on('click', (event) => {

		$('.personal-account__order').each((index, item) => {
			$(item).removeClass('personal-account__order-active');
		});



		$(event.currentTarget).toggleClass('personal-account__order-active');
		
		$('html, body').animate({
			scrollTop: $(event.currentTarget).offset().top
		}, 100);

	});








	$('.bestsellers__block-circle-button-favorite').on('click', (event) => {

		$(event.currentTarget).hasClass('active') ? $(event.currentTarget).removeClass('active') : $(event.currentTarget).toggleClass('active');

	});


});



