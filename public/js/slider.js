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


    $('.second-item__name_dropdown-left__item').on('click', function(event){
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



});
