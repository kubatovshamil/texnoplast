<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Texnoplast Site</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap3.grid.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/fonts/font.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- JQuery -->
		<script src="{{ asset('libs/jquery/3.5.1/jquery.min.js') }}"></script>
		<!-- arcticModal -->
		<script src="{{ asset('libs/arcticmodal/jquery.arcticmodal-0.3.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('libs/arcticmodal/jquery.arcticmodal-0.3.css') }}">
		<!-- Tiny Slider -->
		<link rel="stylesheet" href="{{ asset('libs/tiny-slider/tiny-slider.css') }}">
		<script src="{{ asset('libs/tiny-slider/tiny-slider.js') }}"></script>
		<!-- JQuery-Lighter -->
		<link rel="stylesheet" href="{{ asset('libs/jquery-lighter/jquery.lighter.css') }}">
		<script src="{{ asset('libs/jquery-lighter/jquery.lighter.js') }}"></script>
		<script src="{{asset('js/slider.js')}}"></script>
	</head>
	<body>
		@include('layouts.header')

		@yield('content')

		@include('layouts.footer')

        <div class="modal__modal-box">
            <div class="box-modal" id="Modal">
                <div class="box-modal_close arcticmodal-close">&#10006;</div>

                <p class="modal__desc">Товар добавлен в корзину!</p>

                <div class="modal__buttons">
                    <a class="modal__button bag" href="order_forming.php">Перейти в корзину</a>
                    <div class="modal__button continue arcticmodal-close">Продолжить покупки</div>
                </div>
            </div>
        </div>


	</body>
</html>
