<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <link rel="canonical" href="@yield('canonical')"/>
        <link rel="shortcut icon" href="{{ asset("/img/favicon.ico") }}" type="image/x-icon">
		<title>@yield('title')</title>
		<meta name="yandex-verification" content="65bca5d7dc3605f6" />
		<meta name="google-site-verification" content="u8-MlDFXMlJn49reaVlqxOTjuBARDj5qNERxH6JfrJI" />
		<!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        
           ym(86852741, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/86852741" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <script src="//code-ya.jivosite.com/widget/sc44ikR8K6" async></script>
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
