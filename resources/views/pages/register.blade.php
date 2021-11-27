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
                                    <input type="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="name">*Имя:</label>
                                    <input type="text" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="surname">*Фамилия:</label>
                                    <input type="text" name="surname">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-sm-12 col-12">
                            <div class="registration__form__right">
                                <div class="form-group">
                                    <label for="password">*Пароль:</label>
                                    <input type="password" name="password">
                                </div>

                                <div class="form-group">
                                    <label for="repeatPassword">*Повторите пароль:</label>
                                    <input type="password" name="password2">
                                </div>
                            </div>
                        </div>
                    </div>


                </fieldset>
                <div class="registration__form__checkbox">
                    <div class="form-group">
                        <input type="checkbox" id="cbPersonalData" class="custom-checkbox">
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

@endsection
