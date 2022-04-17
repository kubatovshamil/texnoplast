@extends('layouts.index')


@section("title", "MaksProm - страница Оформление заказа")
@section("description", "Оформление заказа")
@section("keywords", "Товары в корзине")


@section("canonical", url("/basket.php"))

@section('content')
    <div class="order-forming container">
        <x-bread-crumbs />
        <h1 class="order-forming-title">Оформление заказа</h1>

        @if(!empty($products))
        <span class="order-forming__products-desc">Товары в вашей корзине</span>

        <div class="order-forming__products">
            @foreach($products as $product)
                <div class="order-forming__products-product">

                    <img src="{{ asset('storage/products/' . $product['image']) }}" class="order-forming__product-img" alt="not found">

                    <div class="order-forming__product-content">
                        <a href="#" class="order-forming__product-title">{{ $product['title'] }}</a>
                    </div>

                    <div class="order-forming__product-count">
                        <input value="{{ $product['quantity'] }}" data-id="{{ $product['id'] }}" class="order-forming__product-count-input" type="text">
                        <span class="order-forming__product-count-minus"></span>
                        <span class="order-forming__product-count-plus"></span>
                    </div>

                    <div class="order-forming__product-price">
                        <p class="order-forming__product-price-old">₽</p>
                        <p class="order-forming__product-price-new">{{ $product['price'] }}<span class="sup_rub">₽</span></p>
                    </div>

                    <a href="javascript:void(0)" class="order-forming__product-price-remove"></a>
                </div>
            @endforeach
        </div>

            <form action="{{ route('order') }}" method="post" class="order-forming__form">
                @csrf
                <h1 class="order-forming__form-title">Введите ваши данные</h1>
                <span class="order-forming__form-small-text">*Поля обязательные для заполнения</span>
                <div class="form-group">
                    <input class="order-forming__form-input-row" name="fullname" id="fullname" placeholder="*Имя и Фамилия" type="text">
                </div>

                <div class="form-group">
                    <input class="order-forming__form-input-row" name="mobile" id="phone" placeholder="*Телефон" type="text">
                </div>

                <div class="form-group">
                    <input class="order-forming__form-input-row" name="email" id="email" placeholder="*Email" type="text">
                </div>

                <h1 class="order-forming__form-title">Укажите адрес доставки</h1>
                <div class="form-group">
                    <input class="order-forming__form-input-row" id="city" name="city" placeholder="*Город" type="text">
                </div>

                <div class="form-group">
                    <input class="order-forming__form-input-row" id="street" name="street" placeholder="*Улица" type="text">
                </div>

                <div class="order-forming__form-row">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input class="order-forming__form-input-col" id="house" name="house" placeholder="*Дом/корпус" type="text">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input class="order-forming__form-input-col" id="apartament" name="apartament" placeholder="*Квартира" type="text">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <textarea class="order-forming__form-textarea" id="note" name="note" placeholder="Комментарии"></textarea>
                </div>


                <div class="order-forming__form-row">
                    <label class="order-forming__form-button-col data-checkbox" for="data-checkbox">
                        <input class="order-forming__form-button-data-checkbox-hidden" id="data-checkbox" type="checkbox">
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

        @else
            <span class="order-forming__products-desc">Корзина пуста</span>
            <div class="order-forming__products"></div>
        @endif


    </div>


    <script src="{{ asset('libs/maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script>
        $("#phone").mask("+7 (999) 999-99-99");
        $(".order-forming__form").validate({
            rules: {
                fullname: {
                    required : true,
                    maxlength: 40,
                    minlength : 12,
                },
                phone : {
                    required : true,
                },
                email : {
                    required : true,
                    email : true,
                },
                city : {
                    required: true,
                },
                street : {
                    required: true,
                },
                house: {
                    required: true,
                },
                apartament: {
                    required: true,
                },
                note: {
                    required: true,
                },
            }
        });
    </script>
@endsection
