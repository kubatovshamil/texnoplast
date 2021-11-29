@extends('layouts.index')


@section('content')

<div class="registration">
    <div class="container">
        <x-bread-crumbs />
        <div class="registration__top">
            <h1 class="registration__top__title">Регистрация</h1>
            <p class="registration__top__text">
                Сообщество является частью сайта MaksProm.
                Поэтому если вы уже зарегистрированы на maksprom.ru,
                просто воспользуйтесь своими логином и паролем чтобы
                <a href="" class="login">войти</a>
            </p>
        </div>

        <div class="registration__form">
            <form action="{{ route('signup') }}" method="post">
                @csrf
                @method('POST')
                <fieldset class="fieldset">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-sm-12 col-12">
                            <div class="registration__form__left">
                                <div class="form-group">
                                    <label for="email">*Email:</label>
                                    <input type="email" id="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="name">*Имя:</label>
                                    <input type="text" id="name" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="surname">*Фамилия:</label>
                                    <input type="text" id="surname" name="surname">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-sm-12 col-12">
                            <div class="registration__form__right">
                                <div class="form-group">
                                    <label for="password">*Пароль:</label>
                                    <input type="password" id="password" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="repeatPassword">*Повторите пароль:</label>
                                    <input type="password" id="password2" name="password2">
                                </div>
                            </div>
                        </div>
                    </div>


                </fieldset>
                <div class="registration__form__checkbox">
                    <div class="form-group">
                        <input type="checkbox" id="cbPersonalData" id="checkbox" class="custom-checkbox">
                        <label for="cbPersonalData">
                            Я согласен на
                            <a class="green-link" target="_blank" href="/police">
                                обработку моих данных<span class="green-label">*</span></a>
                        </label>
                    </div>

                    <div class="form-group btn">
                        <button type="submit">Зарегистрироваться</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


{{--<script>--}}
{{--    $(".registration__form form").validate({--}}
{{--        rules: {--}}
{{--            email: {--}}
{{--                required : true,--}}
{{--                email : true,--}}
{{--            },--}}
{{--            surname: {--}}
{{--                required : true,--}}
{{--                minlength: 5,--}}
{{--                maxlength: 20--}}
{{--            },--}}
{{--            name: {--}}
{{--                required : true,--}}
{{--                minlength: 2,--}}
{{--                maxlength: 20--}}
{{--            },--}}
{{--            password: {--}}
{{--                required : true,--}}
{{--                minlength: 2,--}}
{{--            },--}}
{{--            password2: {--}}
{{--                required : true,--}}
{{--                minlength: 2,--}}
{{--            },--}}
{{--            checkbox: {--}}
{{--                checked : true,--}}
{{--            },--}}
{{--        },--}}
{{--        messages: {--}}
{{--            email: {--}}
{{--                required: "Email обязателен для ввода",--}}
{{--                email: "Вы должны ввести актуальный email",--}}
{{--            },--}}
{{--            surname: {--}}
{{--                required: "Фамилия обязателен для ввода",--}}
{{--                minlength: "Фамилия не должно быть меньше чем 5 букв",--}}
{{--                maxlength: "Фамилия не должно быть больше чем 20 букв"--}}
{{--            },--}}
{{--            name: {--}}
{{--                required: "Email обязателен для ввода",--}}
{{--                minlength: "Имя не должно быть меньше чем 2 букв",--}}
{{--                maxlength: "Имя не должно быть больше чем 20 букв"--}}
{{--            },--}}
{{--            password: {--}}
{{--                required: "Пароль обязателен для ввода",--}}
{{--                email: "Слишком слабый пароль",--}}
{{--            },--}}
{{--            password2: {--}}
{{--                required: "Пароль обязателен для ввода",--}}
{{--                minlength: "Слишком слабый пароль"--}}
{{--            },--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}


@endsection

