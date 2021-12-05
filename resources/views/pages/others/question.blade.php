@extends('layouts.index')

@section('title', 'MaksPrm - страница задать вопрос')


@section('content')

<div class="question">
    <div class="container">

        <x-bread-crumbs />
        <div class="question-links">
            <h1 class="question-links__title">Вы можете задать вопрос:</h1>
            <ul class="question-links-list">

                <li class="question-links-list__item whatsapp">
                    в WhatsApp по номеру телефона
                    <a class="question-links-list__item__link" href="https://wa.me/79807153571">+7 (980) 715-35-71</a>
                </li>

{{--                <li class="question-links-list__item instagram">--}}
{{--                    в наш инстаграм в дирикет по--}}
{{--                    <a class="question-links-list__item__link" href="instagram">сыылке</a>--}}
{{--                </li>--}}

{{--                <li class="question-links-list__item vk">--}}
{{--                    в нашей группе ВКонтакте--}}
{{--                    <a class="question-links-list__item__link" href="tel:+79375972520">https://vk.me/shymka_ru</a>--}}
{{--                </li>--}}

                <li class="question-links-list__item mailer">
                    Написав нам на электронную почту
                    <a class="question-links-list__item__link" href="malito:info@maksprom.ru">info@maksprom.ru</a>
                </li>

            </ul>
        </div>
    </div>
</div>

@endsection
