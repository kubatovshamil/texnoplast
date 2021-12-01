@extends('layouts.index')

@section('title', 'MaksPrm - страница о нас')

@section('content')

<div class="about-us">
    <div class="container">

        <x-bread-crumbs />
        <img src="img/about_img.jpg" class="about-us__block about-us__img" alt="">

        <div class="about-us__block about-us__text">
            <div class="about-us__content">
                <h1 class="about-us__text-header">О компании</h1>

                <p class="about-us__text-desc">
                    МаксПром – это крупнейший в России интернет-магазин материалов. Мы собрали в одном месте все, что может

                    понадобиться для Вас!  У нас Вы можете найти большой выбор материалов! Начиная от недорогих видов

                    и заканчивая европейскими материалами высшего класса. Каждый клиент найдет у нас материал

                    на свой вкус и по привлекательной цене.

                    Мы работаем напрямую с заводами изготовителями и закупаем материалы большими партиями. Это позволяет продавать

                    товар с хорошей скидкой и по выгодной цене. Для оптовых покупателей мы предлагаем специальные условия работы.

                    Если в нашем каталоге нет того, что Вы искали, просто позвоните нам или отправьте запрос на электронную почту
                    <a href="malito:info@maksprom.ru">info@maksprom.ru</a>

                    Мы обязательно Вам поможем!
                </p>
            </div>

        </div>

    </div>
</div>

@endsection
