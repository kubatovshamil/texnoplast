$(document).ready(() => {


	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});

	$('.see__more').on('click', (event) => {

		for (i = 1; i <= 6; i++)
			$('.news-list__wrapper').append($('.news-list__block:last').clone());

	});


});
