<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('styles/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('styles/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('styles/dist/css/style.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.templates.navbar')

    @include('admin.templates.aside')

    @yield('content')

    @include('admin.templates.footer')
</div>
<script src="{{ asset('styles/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('styles/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('styles/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('styles/dist/js/index.js')}}"></script>
</body>
</html>
