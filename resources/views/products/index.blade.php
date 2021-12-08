@extends('layouts.index')

@section('description', $product->descriptions)
@section('keywords', $product->keywords)
@section('title', $product->title)

@section('content')


    <div class="product-card container">

        <x-bread-crumbs />


        <div class="product-card__characteristics-mobile">
            <h1 class="product-card__characteristics-title">{{ $product->title }}</h1>

            <div class="product-card__characteristics-functions">
                <a href="#" class="product-card__functions-favorite">В избранное</a>

                <a href="#" class="product-card__functions-in_stock">В наличии!</a>

            </div>
        </div>

        <div class="product-card__images">
            <div class="product_card__big-image-wrapper">
                <img src="{{ asset('storage/products/' . $product->img) }}" alt="" class="product_card__big-image">
            </div>

            @if(isset($galleries))
                <div class="product_card__image-carousel">
                    <div class="product_card__image-carousel__wrapper">
                        <div class="product_card__image-wrapper product_card__image-active">
                            <img src="{{ asset('storage/products/' . $product->img) }}" class="product_card__image" alt="img">
                        </div>
                        @foreach($galleries as $gallery)
                            <div class="product_card__image-wrapper product_card__image">
                                <img src="{{ asset('storage/products/' . $gallery->img) }}" class="product_card__image" alt="img">
                            </div>
                        @endforeach

                    </div>

                    <div class="product_card__image-arrow">
                        <a href="javascript:void(0)" class="product_card__image-carousel__left-arrow"></a>
                        <a href="javascript:void(0)" class="product_card__image-carousel__right-arrow"></a>
                    </div>
                </div>
            @endif

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
                    @if(isset($product->discount))
                        <span class="product-card__block-stock">-{{ round(($product->discount - $product->price) * 100 / $product->discount) }}%</span>
                    @endif
                    <p class="product-card__prices-old">{{ $product->discount }}₽</p>
                    <p class="product-card__prices-new">{{ $product->price }}<span class="price_rub">₽</span></p>
                </div>

                <div class="product-card__buttons">
                    <a href="javascript:void(1)" data-id="{{ $product->id }}" class="product-card__buttons-buy bestsellers__block-button-buy">Купить</a>
                </div>
            </div>

            <input id="show_charact" name="characts-tab" class="product-card__characts-open charact_char hide" type="radio">
            <label for="show_charact" class="product-card__characts-title charact_char">Характеристики</label>


            <div class="product-card__characteristics-characts charact_char">
                @foreach($attributes as $k => $attribute)
                    @if($k > 7)
                        <div class="product-card__characts-block hide-char" style="display: none">
                            <p class="product-card__characts-thead">{{ $attribute->name }}</p>
                            <p class="product-card__characts-tbody">{{ $attribute->value }}</p>
                        </div>
                    @else
                        <div class="product-card__characts-block">
                            <p class="product-card__characts-thead">{{ $attribute->name }}</p>
                            <p class="product-card__characts-tbody">{{ $attribute->value }}</p>
                        </div>
                    @endif
                @endforeach
                @if(count($attributes) > 7)
                        <div class="show-more">
                            <a href="#" class="btn-more">Показать больше</a>
                        </div>
                    @endif

            </div>

        </div>

        <div class="product_card__description">
            <h1 class="product_card__description-title">Описание</h1>
            <p class="product_card__description-content">{{ $product->specification }}</p>
        </div>

        <x-best-seller />

    </div>


@endsection
