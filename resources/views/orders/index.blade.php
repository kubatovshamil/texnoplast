@extends('layouts.index')

@section('content')
    <div class="order-forming container">
        <x-bread-crumbs />
        <h1 class="order-forming-title">Оформление заказа</h1>

        <span class="order-forming__products-desc">Товары в вашей корзине</span>

        <div class="order-forming__products">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="order-forming__products-product">
                    <div class="order-forming__product-img"></div>

                    <div class="order-forming__product-content">
                        <a href="#" class="order-forming__product-title">{{ $product['title'] }}</a>
                    </div>

                    <div class="order-forming__product-count">
                        <input value="{{ $product['quantity'] }}" data-id="{{ $product['id'] }}" class="order-forming__product-count-input" type="text">
                        <span class="order-forming__product-count-minus"></span>
                        <span class="order-forming__product-count-plus"></span>
                    </div>

                    <div class="order-forming__product-price">
                        <p class="order-forming__product-price-old">{{ $product['discount'] }}₽</p>
                        <p class="order-forming__product-price-new">{{ $product['price'] }}<span class="sup_rub">₽</span></p>
                    </div>

                    <a href="javascript:void(0)" class="order-forming__product-price-remove"></a>
                </div>
                @endforeach
            @endif
        </div>

        <form action="#" class="order-forming__form">
            <h1 class="order-forming__form-title">Введите ваши данные</h1>
            <span class="order-forming__form-small-text">*Поля обязательные для заполнения</span>

            <input class="order-forming__form-input-row" placeholder="*Имя и Фамилия" type="text">
            <input class="order-forming__form-input-row" placeholder="*Телефон" type="text">
            <input class="order-forming__form-input-row" placeholder="*Email" type="text">

            <h1 class="order-forming__form-title">Укажите адрес доставки</h1>

            <input class="order-forming__form-input-row" placeholder="*Город" type="text">
            <input class="order-forming__form-input-row" placeholder="*Улица" type="text">
            <div class="order-forming__form-row">
                <input class="order-forming__form-input-col" placeholder="*Дом/корпус" type="text">
                <input class="order-forming__form-input-col" placeholder="*Квартира" type="text">
            </div>
            <textarea class="order-forming__form-textarea" placeholder="Комментарии"></textarea>

            <h1 class="order-forming__form-title">Способы доставки</h1>

            <div class="order-forming__form-row">
                <input class="order-forming__form-radio" id="delivery" type="radio" name="delivery_methods" checked>
                <label for="delivery" class="order-forming__form-button-col deliver">
                    Доставка
                </label>

                <input class="order-forming__form-radio" id="pickup" type="radio" name="delivery_methods">
                <label for="pickup" class="order-forming__form-button-col shipping">
                    Самовывоз
                </label>
            </div>

            <input class="order-forming__form-radio" id="delivery_ru" type="radio" name="delivery_methods">
            <label for="delivery_ru" class="order-forming__form-button-row plane">
                Доставка по РФ
            </label>

            <div class="order-forming__form-row">
                <label class="order-forming__form-button-col data-checkbox" for="data-checkbox">
                    <input class="order-forming__form-button-data-checkbox-hidden" id="data-checkbox" type="checkbox" checked>
                    <span class="order-forming__form-checkmark"></span>
                </label>

                <p class="order-forming__form-button-col data-text">Согласен на <a class="order-forming__form-personal-data" href="/police">обработку своих персональных данных</a></p>
            </div>

            <div class="order-forming__form-row">
                <h2 class="order-forming__form-title total-title">Итого к оплате</h2>
                @php $total = 0 @endphp
                @foreach((array) $products as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
                <p class="order-forming__form-total-price">{{ $total }}<span class="sup_rub-big">₽</span></p>
                <span class="order-forming__form-total-desc">*Сумма без учета доставки</span>
            </div>

            <button class="order-forming__form-submit-button" type="submit">Оформить заказ</button>
        </form>

    </div>

@endsection
