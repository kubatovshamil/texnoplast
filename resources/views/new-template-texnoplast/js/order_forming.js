$(document).ready(() => {


	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});

	if(!$('.order-forming__products-product').length) {
		$('.order-forming__products-desc').text('Корзина пуста');
		$('.order-forming__product-total').remove();
	}




	$('.order-forming__product-count-plus').on('click', (event) => {

		var input = $(event.currentTarget).parent().find('.order-forming__product-count-input');

		$(input).val(parseInt($(input).val()) + 1 || 1);

	});



	$('.order-forming__product-count-minus').on('click', (event) => {

		var input = $(event.currentTarget).parent().find('.order-forming__product-count-input');

		if ($(input).val() <= 1)
			return;

		$(input).val(parseInt($(input).val()) - 1 || 1);

	});




	$('.order-forming__product-price-remove').on('click', (event) => {

		$(event.currentTarget).parent().remove();


		if(!$('.order-forming__products-product').length) {
			$('.order-forming__products-desc').text('Корзина пуста');
			$('.order-forming__product-total').remove();
		}
	});

});
