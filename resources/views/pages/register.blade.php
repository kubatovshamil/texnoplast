@extends('layouts.index')

@section('title', 'MaksPrm - страница регистрации')

@section('description', 'Регистрация в интернет-магазине МаксПром')
@section('keywords', 'регистрация')

@section("canonical", url("/register.php"))
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
                                    <label for="email" class="label">*Почта:</label>
                                    <input type="email" id="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="name" class="label">*Имя:</label>
                                    <input type="text" id="name" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="surname" class="label">*Фамилия:</label>
                                    <input type="text" id="surname" name="surname">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-sm-12 col-12">
                            <div class="registration__form__right">
                                <div class="form-group">
                                    <label for="password" class="label"> *Пароль:</label>
                                    <input type="password" id="password" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="repeatPassword" class="label">*Повторите пароль:</label>
                                    <input type="password" id="confirm_password" name="confirm_password">
                                </div>
                            </div>
                        </div>
                    </div>


                </fieldset>
                <div class="registration__form__checkbox">
                    <div class="form-group">
                        <input type="checkbox" id="cbPersonalData" id="agree" name="agree" value="agree" class="custom-checkbox">
                        <label for="cbPersonalData" id="custom-label">
                            Я согласен на
                            <a class="green-link" target="_blank" href="/police.php">
                                обработку моих данных<span class="green-label">*</span></a>
                        </label>
                        <label id="agree-error" class="error" for="agree"></label>
                    </div>

                    <div class="form-group btn">
                        <button type="submit">Зарегистрироваться</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>


<script>
    $(".registration__form form").validate({
        rules: {
            email: {
                required : true,
                email : true,
            },
            surname: {
                required : true,
                minlength: 5,
                maxlength: 20
            },
            name: {
                required : true,
                minlength: 2,
                maxlength: 20
            },
            password: {
                required : true,
                minlength: 2,
            },
            confirm_password: {
                required : true,
                minlength: 2,
                equalTo: "#password"
            },
            agree : {
                required : true,
            }
        },
    });
</script>

@endsection
