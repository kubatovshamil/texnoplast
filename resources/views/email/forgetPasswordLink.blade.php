@extends('layouts.index')


@section('content')
    <main class="login-form">
        <div class="container">
            <h1 class="order-forming-title">Восстановления пароля</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('reset.password.post') }}" method="POST" id="reset-password">
                                @csrf
                                @method('post')
                                <fieldset class="fieldset">

                                    <div class="row">
                                        <div class="col-xs-12 col-md-6 col-sm-12 col-12">

                                            <input type="hidden" name="token" value="{{ $token }}">


                                            <div class="form-group">
                                                <label for="email">*Email:</label>
                                                <input type="email" id="email" name="email">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="name">*Пароль:</label>
                                                <input type="password" id="password" name="password" required autofocus>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="name">*Повторите пароль:</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation" required autofocus>
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-md-12 offset-md-12">
                                                <button type="submit" class="btn btn-primary">
                                                    Сбросить пароль
                                                </button>
                                            </div>


                                        </div>
                                    </div>

                                </fieldset>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>

        $("#reset-password").validate({
            rules: {
                email: {
                    required : true,
                    email : true,
                },
                password: {
                    required : true,
                },
                password_confirmation: {
                    required : true,

                },
            },
            messages: {
                email: {
                    required: "Email обязателен для ввода",
                    email: "Вы должны ввести актуальный email",
                },
                password: {
                    required: "Пароль обязателен для ввода",
                },
                password_confirmation: {
                    required: "Пароль обязателен для ввода",
                },
            }
        });

    </script>


@endsection
