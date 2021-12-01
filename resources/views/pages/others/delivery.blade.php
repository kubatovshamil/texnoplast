
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
                            Доставка курьером в пределах МКАД. Доставка пешим курьером (вес меньше 5 кг)
                        </div>

                        <div class="delivery__content__row__column">
                            При заказе от 15 000 рублей - БЕСПЛАТНАЯ доставка по Москве;
                            При сумме заказа от 10 000 до 15 000 рублей - доставкой нашими
                            курьерами за 200 рублей; При сумме заказа
                            до 10 000 рублей - доставкой нашими курьерами за 400 рублей.
                        </div>

                        <div class="delivery__content__row__column">
                            На следующий день при оформлении после 12:00
                        </div>

                        <div class="delivery__content__row__column">
                            Доставка оплачивается при получении заказа.
                            Время ожидания курьера - 15 минут с момента звонка о прибытии.
                            Повторная доставка осуществляется после полной оплаты товара и доставки.
                        </div>
                    </div>
                    <div class="delivery__content__row">
                        <div class="delivery__content__row__column">
                            Доставка авто-курьером (вес свыше 5 кг)
                        </div>

                        <div class="delivery__content__row__column">
                            При заказе от 15 000 рублей - БЕСПЛАТНАЯ доставка по Москве;
                            При сумме заказа от 10 000 до 15 000 рублей - доставкой нашими курьерами за 300 рублей;
                            При сумме заказа до 10 000 рублей - доставкой нашими курьерами за 600 рублей;
                            При заказе до 1 000 рублей - курьерскими службами на выбор: «Достависта» или «СДЭК» - по их тарифам.
                        </div>

                        <div class="delivery__content__row__column">
                            На следующий день при оформлении после 12:00.
                        </div>

                        <div class="delivery__content__row__column">
                            Доставка оплачивается при получении заказа.
                            Время ожидания курьера - 15 минут с момента звонка о прибытии.
                            Повторная доставка осуществляется после полной оплаты товара и доставки.
                        </div>
                    </div>
                    <div class="delivery__content__row">
                        <div class="delivery__content__row__column">
                            Почтой России
                        </div>

                        <div class="delivery__content__row__column">
                            По тарифам перевозчика
                        </div>

                        <div class="delivery__content__row__column">
                            Отправки 2 раза в неделю
                        </div>

                        <div class="delivery__content__row__column">
                            Банковской картой онлайн Безналичный расчет (по счету)
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
