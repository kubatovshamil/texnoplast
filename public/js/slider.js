$(document).ready(() => {

    if($('.main-slider__wrapper').length)
    {
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
    }

    if($('.bestsellers__blocks-wrapper').length){
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
    }

    if($('.product_card__image-carousel__wrapper').length) {
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
    }


    $('.product_card__image-wrapper').on('click', (event) => {

        $('.product_card__image-wrapper').each((index, item) => {
            $(item).removeClass('product_card__image-active');
        });

        var clickedImg = $(event.currentTarget).find('.product_card__image').attr('src');
        $('.product_card__big-image').css('background-image', `url(${clickedImg})`);
        $('.product_card__big-image-wrapper img').attr('src', clickedImg);
        $(event.currentTarget).toggleClass('product_card__image-active');

    });


	$('.bestsellers__block-circle-button-favorite').on('click', function () {

        $(this).toggleClass('active');

        if($(this).hasClass('active')){
            $.ajax({
                url: '/addFavorite',
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $(this).parent().parent().find('.bestsellers__block-button-buy').data('id'),
                },
                success: function (response) {
                    $('.header__actions-block__name_favorites').html(response)

                },
                error: function (message){
                    console.log(message);
                }
            });
        }else{
            $.ajax({
                url: '/removeFavorite',
                method: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $(this).parent().parent().find('.bestsellers__block-button-buy').data('id'),
                },
                success: function (response) {
                    if(response == 0){
                        $('.header__actions-block__name_favorites').html('');
                    }else{
                        $('.header__actions-block__name_favorites').html(response)
                    }
                },
                error: function (message){
                    console.log(message);
                }
            });
        }

	});

	$('.bestsellers__block-button-buy').on('click', function () {
        $.ajax({
            url: '/addToCart',
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: $(this).data('id'),
            },
            success: function (response) {
                $('.header__actions-block__name_basket').html(response)

            },
            error: function (message){
                console.log(message);
            }
        });
        getTemplate('/product', 'ajax');
	});

    $('.order-forming__product-count-input').on('input', function(event){
        updateCart('/updateCart', 'PUT', $(this).data('id'), $(this).val())
    });

    $('.order-forming__product-count-plus').on('click', (event) => {

        var input = $(event.currentTarget).parent().find('.order-forming__product-count-input');
        updateCart('/updateCart', 'PUT', $(input).data('id'),
            $(input).val(parseInt($(input).val()) + 1 || 1).val());

    });

    $('.order-forming__product-count-minus').on('click', (event) => {

        var input = $(event.currentTarget).parent().find('.order-forming__product-count-input');
        if ($(input).val() <= 1)
            return;

        updateCart('/updateCart', 'PUT', $(input).data('id'),
            $(input).val(parseInt($(input).val()) - 1 || 1).val());
    });

    $('.armchair').on('click', function () {
        getTemplate('/order', 'ajax');
    });

	$('.header__actions-block.header__actions-block__name_search').on('click', function () {

		$('#Search').arcticmodal({
			closeOnEsc: true,
    		closeOnOverlayClick: true
		});

	});

    $('.second-item__name_dropdown-left__item').hover(function(event){

        let dropdownRight = $('.second-item__name_dropdown__right'),
            currentIndex = $(this).index();

        $('.second-item__name_dropdown-left__item').each((index, item) =>{
            if($(item).hasClass("active"))
                $(item).removeClass("active");
            $(dropdownRight[index]).removeClass('show');

        });

        $(this).addClass('active');
        $(dropdownRight[currentIndex]).addClass('show');

    });


    $('#burger-menu').on('click', function (event){
        $(this).toggleClass('burger-active');
        $('.mobile-menu').toggleClass('transform-menu');
        $('body').toggleClass('block');

    });

    $('.arrow').on('click', function(event){
        event.preventDefault();
        let item = $(this).parent().parent();


        if($(item).hasClass('expanded')){
            item = $(item)[0];
            $(item).removeClass('expanded');
        }else{
            (item).addClass('expanded');
        }
    });

    if(!$('.order-forming__products-products').length) {
        $('.order-forming__product-total').remove();
    }




    $('.order-forming__product-price-remove').on('click', function(event) {

        let id = $(this).parent().find('input').data('id');

        $(event.currentTarget).parent().remove();

        if(!$('.order-forming__products-products').length) {
            $('.order-forming__products-desc').text('Корзина пуста');
            $('.order-forming__form').remove();
            $('.order-forming__product-total').remove();
        }

        $.ajax({
            url: '/removeCart',
            method: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },
            success: function (response) {
                $('.order-forming__form-total-price').html(response['price']);
                if(response['count'] == 0){
                    $('.header__actions-block__name_basket').html('');
                }else{
                    $('.basket_msg').html(response['count']);
                }
            },
            error: function (message){
                console.log(message);
            }
        });

    });

    $('.login').on('click', function (event){
      getChangedModal('/form', 'ajax');
    });

    $(document).on('click', '.forgot-pw', function(){

        $('.box-modal').arcticmodal('close');

        getChangedModal('/restore-password', 'ajax');
    });

    $(document).on('click', '.to-back', function(){

        $('.box-modal').arcticmodal('close');

        getChangedModal('/form', 'ajax');
    });

    $('.footer__contacts_button').on('click', function (event){
        event.preventDefault();
        getTemplate('/phone', 'ajax');
    });

    $('.btn-provider').on('click', function (event){
        event.preventDefault();
        getTemplate('/provider-form', 'ajax');
    });

    function getTemplate(url, type){
        $.arcticmodal({
            type: type,
            url: url,
            data:{
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
        });
    }
    function getChangedModal(url, type){
        $.arcticmodal({
            overlay: {
                tpl: '<div class="arcticmodal-overlay form-overflow"></div>'
            },
            type: type,
            url: url,
            data:{
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
        });
    }
    function updateCart(url, type, id, qty) {
        $.ajax({
            url: url,
            method: type,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                qty : qty
            },
            success: function (response) {
                $('.order-forming__form-total-price').html(response);
            },
            error: function (message){
                console.log(message);
            }
        });
    }

    $(".btn-more").on("click", function() {
        $(".btn-more").toggleClass("btn-more__active");
        $('.hide-char').toggle();

    });

    $('.product-card__functions-favorite').on('click', function(){
        $(this).toggleClass('active-fav');
        $(".bestsellers__block-circle-button-favorite").toggleClass('active');

        if($(this).hasClass('active-fav')){
            $.ajax({
                url: '/addFavorite',
                method: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $(this).data('id'),
                },
                success: function (response) {
                    $('.header__actions-block__name_favorites').html(response)

                },
                error: function (message){
                    console.log(message);
                }
            });
        }else{
            $.ajax({
                url: '/removeFavorite',
                method: "DELETE",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $(this).data('id'),
                },
                success: function (response) {
                    if(response == 0){
                        $('.header__actions-block__name_favorites').html('');
                    }else{
                        $('.header__actions-block__name_favorites').html(response)
                    }
                },
                error: function (message){
                    console.log(message);
                }
            });
        }


    });

});
