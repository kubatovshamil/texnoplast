<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
		<title>@yield('title')</title>
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
        <!-- JQuery-Validate -->
        <script src="{{ asset('libs/jquery-validation-1.19.3/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('libs/jquery-validation-1.19.3/dist/localization/messages_ru.js') }}"></script>
        <script src="{{asset('js/slider.js')}}"></script>
	</head>
	<body>
		@include('layouts.header')

		@yield('content')

		@include('layouts.footer')

	</body>
</html>
