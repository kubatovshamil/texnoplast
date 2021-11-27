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


<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/admin/login"><b>Админка</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Вход в админку</p>

            <form action="{{ route('to.admin') }}" method="post">
                @csrf
                @method('post')
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>


<script src="{{ asset('styles/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('styles/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('styles/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('styles/dist/js/index.js')}}"></script>
</body>
</html>
