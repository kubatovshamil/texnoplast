
@extends('layouts.index')

@section('title', 'MaksPrm - страница доставки')

@section('content')

<div class="delivery">
    <div class="container">

        <x-bread-crumbs />
        <h1 class="delivery__title">Доставка и оплата товаров</h1>
        <div class="row">
            <div class="col-12">
                <h3 class="deliveryTarif__title">Тарифы на доставку</h3>
                <div class="delivery__content">
                    <div class="delivery__content__row">
                        <div class="delivery__content__row__column">
                            Тип доставки
                        </div>

                        <div class="delivery__content__row__column" style="color: black">
                            Стоимость доставки
                        </div>

                        <div class="delivery__content__row__column">
                            Срок доставки
                        </div>

                        <div class="delivery__content__row__column">
                            Оплата
                        </div>
                    </div>
                    <div class="delivery__content__row">
                        <div class="delivery__content__row__column">
                            Траснпортными компаниями
                        </div>

                        <div class="delivery__content__row__column">
                            По тарифам перевозчика
                        </div>

                        <div class="delivery__content__row__column">

                            На терминал транспортных компаний передаем на
                            следующий день после оформления
                            (бесплатная доставка до терминалов «ПЭК» и «СДЭК»)
                        </div>

                        <div class="delivery__content__row__column">
                            Банковской картой онлайн Безналичный расчет (по счету)
                        </div>
                    </div>
                    <div class="delivery__content__row">
                        <div class="delivery__content__row__column">
                            Самовывоз
                        </div>

                        <div class="delivery__content__row__column">
                            Бесплатно
                        </div>

                        <div class="delivery__content__row__column">
                            Самовывоз возможен после подтверждения заказа
                        </div>

                        <div class="delivery__content__row__column">
                            Наличными или банковской картой Безналичный расчет (по счету)
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
