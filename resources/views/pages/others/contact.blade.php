@extends('layouts.index')

@section('title', 'MaksPrm - страница контакт')

@section('description', '248926, г. Калуга, Аэропортовский переулок д.11 +7 (980) 715-35-71.
Почта для связи makspromi@yandex.ru, svetlanakomarikova@yandex.ru ')
@section('keywords', 'телефон +7 (980) 715-35-71, svetlanakomarikova@yandex.ru, makspromi@yandex.ru')

@section("canonical", url("/contact.php"))

@section('content')

<div class="contacts container">

    <x-bread-crumbs />

    <div class="title">
        <h1 class="title__name">Контакты</h1>
    </div>


    <div class="contacts__address">
        <ul class="contacts__address-address">
            <li class="contacts__address-block location">248926, г. Калуга, Аэропортовский переулок д.11</li>
            <li class="contacts__address-block phone"><a href="tel:+79807153571">+7 (980) 715-35-71</a></li>
            <li class="contacts__address-block whatsapp"><a target="_blank" href="https://wa.me/79807153571">+7 (980) 715-35-71</a></li>
            <li class="contacts__address-block email"><a class="contacts__address-block-bordered" href="mailto:makspromi@yandex.ru">makspromi@yandex.ru</a></li>
            <li class="contacts__address-block email"><a class="contacts__address-block-bordered" href="mailto:svetlanakomarikova@yandex.ru">svetlanakomarikova@yandex.ru</a></li>
            <li class="contacts__address-block site"><a class="contacts__address-block-bordered" href="/">maksprom.ru</a></li>
        </ul>

        <div class="contacts__address-timetable">
            <h2 class="contacts__address-title">График работы:</h2>

            <p class="contacts__address-block">ПН по ПТ: с 09:00 до 19:00</p>
            <p class="contacts__address-block">Сб, Вс - выходной</p>
        </div>

        <div class="contacts__address-map">
            <div class="contacts__map-block">
                <iframe class="contacts__map-frame" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aadd4a3aa07ee300c383c0dfc2366534f55243887450dd106c696c64ae53e1a1e&amp;source=constructor" width="480" height="280"></iframe>
            </div>

            <a target="_blank" href="https://yandex.ru/maps/-/CCUuu-bNXD" class="contacts__map-nav">Проложить маршрут в навигаторе</a>
        </div>
    </div>

</div>

@endsection
