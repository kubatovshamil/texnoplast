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
		arrowKeys: false,
		rewind: false,
		autoplayButtonOutput: false,
		autoplayTimeout: 10000,
		autoplay: true,
		loop: true,
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



	var range_slider = $('#noUiSlider.catalog__settings-range-slider').get(0);
	var price_from = $('#price_from.catalog__settings-range_input');
	var price_to = $('#price_to.catalog__settings-range_input');

	noUiSlider.create(range_slider, {
		start: [2000, 18000],
		step: 10,
		range: {
			min: 0,
			max: 20000
		}
	});


	range_slider.noUiSlider.on('update', (values) => {
		$(price_from).val(parseInt(values[0]));
		$(price_to).val(parseInt(values[1]));
	});


	$(price_from).on('change', (event) => {
		range_slider.noUiSlider.set([$(event.currentTarget).val(), $(price_to).val()]);
	});

	$(price_to).on('change', (event) => {
		range_slider.noUiSlider.set([$(price_from).val(), $(event.currentTarget).val()]);
	});




	if ($(window).width() <= 960) {

		var catalog_settings = $('.catalog__settings .catalog__settings-block').clone();
		
		$(catalog_settings).each(function (index, item) {
			
			$(item).find('#noUiSlider.catalog__settings-range-slider').attr('id', 'noUiSlider2');
			$(item).find('#noUiSlider2.catalog__settings-range-slider').empty();
			$(item).find('#price_from.catalog__settings-range_input').attr('id', 'price_from2');
			$(item).find('#price_to.catalog__settings-range_input').attr('id', 'price_to2');
			$('#Filter.box-filter').append(item);

		});


		var range_slider2 = $('#noUiSlider2.catalog__settings-range-slider').get(0);
		var price_from2 = $('#price_from2.catalog__settings-range_input');
		var price_to2 = $('#price_to2.catalog__settings-range_input');

		noUiSlider.create(range_slider2, {
			start: [2000, 18000],
			step: 10,
			range: {
				min: 0,
				max: 20000
			}
		});


		range_slider2.noUiSlider.on('update', (values) => {
			$(price_from2).val(parseInt(values[0]));
			$(price_to2).val(parseInt(values[1]));
		});


		$(price_from2).on('change', (event) => {
			range_slider2.noUiSlider.set([$(event.currentTarget).val(), $(price_to2).val()]);
		});

		$(price_to2).on('change', (event) => {
			range_slider2.noUiSlider.set([$(price_from2).val(), $(event.currentTarget).val()]);
		});



		$('.catalog__settings-mobile').on('click', function () {

			$('#Filter').arcticmodal({
				closeOnEsc: true,
	    		closeOnOverlayClick: true
			});

		});

	}



	$('.catalog__categories-title').on('click', (event) => {

		var toggleID = $(event.currentTarget).attr('data-toggle');

		$('.catalog__categories-title').each((index, item) => {
			$(item).removeClass('catalog__categories-title-active');
		});

		$('.catalog__products').each((index, item) => {
			$(item).removeClass('catalog__products-active');
		});



		$(event.currentTarget).toggleClass('catalog__categories-title-active');
		$(`#${toggleID}`).toggleClass('catalog__products-active');
	});



	$('.catalog__filters-filter').on('click', (event) => {
		var toggleID = $(event.currentTarget).attr('data-toggle');


		$('.catalog__filters-filter').each((index, item) => {
			$(item).removeClass('catalog__filters-filter-active');
		});

		$('.catalog__settings-wrapper').each((index, item) => {
			$(item).removeClass('catalog__settings-wrapper-active');
		});



		$(event.currentTarget).toggleClass('catalog__filters-filter-active');
		$(`#${toggleID}`).toggleClass('catalog__settings-wrapper-active');
	});









	$('.catalog__products-scrollup').on('click', (event) => {

		$('html, body').animate({
			scrollTop: $('.catalog__products.catalog__products-active').offset().top
		}, 0);

	});



	$('.bestsellers__block-circle-button-favorite').on('click', (event) => {
		$(event.currentTarget).hasClass('active') ? $(event.currentTarget).removeClass('active') : $(event.currentTarget).toggleClass('active');
	});





	$('.see__more').on('click', (event) => {
	


		$('.bestsellers__block-circle-button-favorite').on('click', (event) => {

			$(event.currentTarget).hasClass('active') ? $(event.currentTarget).removeClass('active') : $(event.currentTarget).toggleClass('active');

		});
	});






	// Pagination

	var blocks_count = 0;
	var blocks_count_per_page = 16;
	var page_count = 0;



	$('.catalog__products').each((index, category) => {

		var category_wrapper = $(category).find('.catalog__products-wrapper');
		var items = $.makeArray( $(category_wrapper).find('.bestsellers__block') );

		blocks_count = $(category_wrapper).find('.bestsellers__block').length;
		page_count = Math.ceil(blocks_count / blocks_count_per_page);


		for (i = 1; i <= page_count; i++) {
			$(category_wrapper).append(`<div id="${i}" class="catalog__products-page"></div>`);

			for (j = 0; j < blocks_count_per_page; j++) {
				$('.catalog__products-page:last').append(items[j]);
			}
			
			items.splice(0, blocks_count_per_page);
		}


		$(category_wrapper).find('#1.catalog__products-page').toggleClass('current-page');




		var pagination_wrapper = $(category).find('.catalog__pages-num-wrapper');
		var max_paging_buttons = 5;


		if (page_count < max_paging_buttons)
			max_paging_buttons = page_count;

		
		for (i = 1; i <= max_paging_buttons; i++)
			$(pagination_wrapper).append(`<a href="javascript:void(0)" data-max-page="${page_count}" data-page="${i}" class="catalog__pages-num">${i}</a>`);


		if (page_count > max_paging_buttons) {
			$(category).find('.catalog__pages-dots-wrapper-next').append('<p class="catalog__pages-dots">...</p>');
			$(category).find('.catalog__pages-dots-wrapper-next').append(`<p class="catalog__pages-dots">${page_count}</p>`);
		}


		$(pagination_wrapper).find('.catalog__pages-num[data-page="1"]').toggleClass('current-page');





		$(pagination_wrapper).find('.catalog__pages-num').on('click', (event) => {

			var clicked_page_index = parseInt($(event.currentTarget).attr('data-page'));


			// hide current page
			$(category).find('.catalog__products-page.current-page').removeClass('current-page');
			// show selected page
			$(category).find(`#${clicked_page_index}.catalog__products-page`).toggleClass('current-page');


			$(pagination_wrapper).find('.catalog__pages-num.current-page').removeClass('current-page');
			$(pagination_wrapper).find(`.catalog__pages-num[data-page="${clicked_page_index}"]`).toggleClass('current-page');
			

			// Scroll up
			// $('html, body').animate({
			// 	scrollTop: $('.catalog__products.catalog__products-active').offset().top
			// }, 0);

		});



		$(category).find('.catalog__pages-begin').on('click', (event) => {

			$('.catalog__products-active .catalog__pages-num').each((index, button) => {
				$(button).attr('data-page', index + 1);
				$(button).text(index + 1);
			});


			$('.catalog__products.catalog__products-active').find('.catalog__pages-num.current-page').removeClass('current-page');
			$('.catalog__products.catalog__products-active').find('.catalog__pages-num[data-page="1"]').toggleClass('current-page');

			$('.catalog__products.catalog__products-active').find('.catalog__products-page.current-page').removeClass('current-page');
			$('.catalog__products.catalog__products-active').find(`#1.catalog__products-page`).toggleClass('current-page');

			$(category).find('.catalog__pages-dots').show();

		});





		$(category).find('.catalog__pages-end').on('click', (event) => {

			var max_page_count = parseInt($('.catalog__products-active .catalog__pages-num').attr('data-max-page'));

			$('.catalog__products-active .catalog__pages-num').each((index, button) => {
				$(button).attr('data-page', (index + 1) + (max_page_count - max_paging_buttons));
				$(button).text((index + 1) + (max_page_count - max_paging_buttons));
			});


			$('.catalog__products.catalog__products-active').find('.catalog__pages-num.current-page').removeClass('current-page');
			$('.catalog__products.catalog__products-active').find(`.catalog__pages-num[data-page="${max_page_count}"]`).toggleClass('current-page');

			$('.catalog__products.catalog__products-active').find('.catalog__products-page.current-page').removeClass('current-page');
			$('.catalog__products.catalog__products-active').find(`#${max_page_count}.catalog__products-page`).toggleClass('current-page');

			$(category).find('.catalog__pages-dots').hide();

		});








		$(category).find('.catalog__pages-prev').on('click', (event) => {

			var prev_page_index = parseInt($('.catalog__products-active .catalog__pages-num.current-page').attr('data-page')) - 1;
			var current_button_index = parseInt($(`.catalog__products-active .catalog__pages-num[data-page="${prev_page_index}"]`).index());

			if (prev_page_index < 1)
				return;



			// "Redrawing" paging buttons 
			if (current_button_index < 0 ) {

				$(category).find('.catalog__pages-dots').show();


				$('.catalog__products-active .catalog__pages-num').each((index, button) => {
					var current_index = parseInt($(button).attr('data-page'));

					$(button).attr('data-page', current_index - 1);
					$(button).text(current_index - 1);

				});

			}



			// hide current page
			$(category).find('.catalog__products-page.current-page').removeClass('current-page');
			// show prev page
			$(category).find(`#${prev_page_index}.catalog__products-page`).toggleClass('current-page');


			$(pagination_wrapper).find('.catalog__pages-num.current-page').removeClass('current-page');
			$(pagination_wrapper).find(`.catalog__pages-num[data-page="${prev_page_index}"]`).toggleClass('current-page');


			// Scroll up
			// $('html, body').animate({
			// 	scrollTop: $('.catalog__products.catalog__products-active').offset().top
			// }, 0);

		});




		$(category).find('.catalog__pages-next').on('click', (event) => {

			var next_page_index = parseInt($('.catalog__products-active .catalog__pages-num.current-page').attr('data-page')) + 1;
			var max_page_count = parseInt($('.catalog__products-active .catalog__pages-num').attr('data-max-page'));
			var current_button_index = parseInt($(`.catalog__products-active .catalog__pages-num.current-page`).index()) + 1;
			console.log(current_button_index);



			if (next_page_index > max_page_count)
				return;

			if (next_page_index == max_page_count)
				$(category).find('.catalog__pages-dots').hide();


			// "Redrawing" paging buttons 
			if (current_button_index >= max_paging_buttons &&
				max_page_count > max_paging_buttons) {

				$('.catalog__products-active .catalog__pages-num').each((index, button) => {
					var current_index = parseInt($(button).attr('data-page'));

					$(button).attr('data-page', current_index + 1);
					$(button).text(current_index + 1);

				});

			}



			// hide current page
			$(category).find('.catalog__products-page.current-page').removeClass('current-page');
			// show next page
			$(category).find(`#${next_page_index}.catalog__products-page`).toggleClass('current-page');


			$(pagination_wrapper).find('.catalog__pages-num.current-page').removeClass('current-page');
			$(pagination_wrapper).find(`.catalog__pages-num[data-page="${next_page_index}"]`).toggleClass('current-page');
			


			// Scroll up
			// $('html, body').animate({
			// 	scrollTop: $('.catalog__products.catalog__products-active').offset().top
			// }, 0);

		});


	});



});
