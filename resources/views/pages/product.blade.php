@extends('layout')


@section('content')


    <div class="product-card container">
        <div class="product-card__characteristics-mobile">

            <h1 class="product-card__characteristics-title">{{ $product->title }}</h1>

            <div class="product-card__characteristics-functions">
                <a href="#" class="product-card__functions-favorite">В избранное</a>

                <a href="#" class="product-card__functions-in_stock">В наличии!</a>

                <a href="#" class="product-card__functions-warranty">Гарантия</a>
            </div>
        </div>

        <div class="product-card__images">
            <div class="product_card__big-image-wrapper">
                <img src="{{ asset('storage/products/' . $product->img) }}" alt="" class="product_card__big-image">
            </div>

            <div class="product_card__image-carousel">
                    <div class="product_card__image-carousel__wrapper">

                        <div class="product_card__image-wrapper product_card__image-active">
                            <img src="img/product_img.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/main-news_bg.jpeg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/product_img.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/insta-photo1.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/product_img.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/insta-photo2.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/insta-photo3.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/product_img.jpg" class="product_card__image" alt="img">
                        </div>

                        <div class="product_card__image-wrapper">
                            <img src="img/product_img.jpg" class="product_card__image" alt="img">
                        </div>

                    </div>


                    <div class="product_card__image-arrow">
                        <a href="javascript:void(0)" class="product_card__image-carousel__left-arrow"></a>
                        <a href="javascript:void(0)" class="product_card__image-carousel__right-arrow"></a>
                    </div>
                </div>

        </div>

        <div class="product-card__characteristics">

            <div class="product-card__characteristics-desktop">
                <h1 class="product-card__characteristics-title">{{ $product->title }}</h1>

                <div class="product-card__characteristics-functions">
                    <a href="#" class="product-card__functions-favorite">В избранное</a>

                    <a href="#" class="product-card__functions-in_stock">В наличии!</a>

                    <a href="#" class="product-card__functions-warranty">Гарантия</a>
                </div>
            </div>

            <div class="product-card__characteristics-ordering">
                <div class="product-card__price">
                    <span class="product-card__block-stock">-{{ round(($product->discount - $product->price) * 100 / $product->discount) }}%</span>
                    <p class="product-card__prices-old">{{ $product->discount }}₽</p>
                    <p class="product-card__prices-new">{{ $product->price }}<span class="price_rub">₽</span></p>
                </div>

                <div class="product-card__buttons">
                    <a href="#" class="product-card__buttons-buy">Купить</a>
                </div>
            </div>

            <input id="show_charact" name="characts-tab" class="product-card__characts-open charact_char hide" type="radio">
            <label for="show_charact" class="product-card__characts-title charact_char">Характеристики</label>


            <div class="product-card__characteristics-characts charact_char">
                @foreach($attributes as $attribute)
                    <div class="product-card__characts-block">
                        <p class="product-card__characts-thead">{{ $attribute->name }}</p>
                        <p class="product-card__characts-tbody">{{ $attribute->value }}</p>
                    </div>
                @endforeach

            </div>

        </div>

        <div class="product_card__description">
            <h1 class="product_card__description-title">Описание</h1>
            <p class="product_card__description-content">{{ $product->specification }}</p>
        </div>

        <x-best-seller />

    </div>


@endsection
