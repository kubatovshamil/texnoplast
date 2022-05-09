@extends('layouts.index')

@section('description', $product->descriptions)
@section('keywords', $product->keywords)
@section("canonical", url("/" . $product->slug . ".php"))
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
                <span class="product-card__characteristics-article">{{ $product->article_number }}</span>

                <h1 class="product-card__characteristics-title">{{ $product->title }}</h1>

                <div class="product-card__characteristics-functions">
                    <a href="javascript:void(1)" data-id="{{ $product->id }}" class="product-favorite product-card__functions-favorite {{ isset(session()->get('favorite')[$product->id]) && session()->get('favorite')[$product->id]['id'] == $product->id  ? 'active-fav' : '' }}">В избранное</a>

                    <a href="#" class="product-card__functions-in_stock">В наличии!</a>

                    <a href="#" class="product-card__functions-warranty">Гарантия</a>
                </div>
            </div>

            <div class="product-card__characteristics-ordering">
                <div class="product-card__price">
                    @if(isset($product->discount))
                        <span class="product-card__block-stock">-{{ $product->discount }}%</span>
                    @endif
                    <p class="product-card__prices-old">₽</p>
                    <p class="product-card__prices-new">{{ $product->price }}<span class="price_rub">₽</span></p>
                </div>

                <div class="product-card__buttons">
                    <a href="javascript:void(1)" data-id="{{ $product->id }}" class="product-card__buttons-buy bestsellers__block-button-buy">Купить</a>
                </div>
            </div>


            <div class="product-card__characteristics-characts">
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
                            <button class="btn-more"><svg viewBox="0 0 14 9" fill="none" xmlns="https://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14 1.6L12.4 0 7 5.4 1.6 0 0 1.6l7 7 7-7z" fill="#333"></path></svg></button>
                        </div>
                    @endif

            </div>

        </div>

        <div class="product_card__description">
            <h1 class="product_card__description-title">Описание</h1>
            <p class="product_card__description-content">{{ $product->specification }}</p>
        </div>

        <div class="product_card__reviews">
            <div class="product_card__reviews__header-wrapper">
                @if(count($reviews) > 0)
                    <div class="product_card__reviews__header-text">
                        <h1 class="product_card__reviews__header-title">Отзывы</h1>
                    </div>

                    <div class="product_card__reviews__header-slider">
                        <div class="product_card__reviews__sliders">
                            <a href="javascript:void(0)" class="product_card__reviews__sliders-arrow product_card__reviews__sliders-arrow-left"></a>
                            <a href="javascript:void(0)" class="product_card__reviews__sliders-arrow product_card__reviews__sliders-arrow-right"></a>
                        </div>
                    </div>
                @endif
            </div>


            <div class="product_card__reviews-wrapper">
                @foreach($reviews as $review)
                    <div class="product_card__reviews-slide">
                        <div class="product_card__reviews-block">
                            <div class="product_card__reviews-content">
                                <h1 class="product_card__reviews-name">{{ $review->name }}</h1>
                                <div class="product_card__reviews-stars">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($review->rating > $i)
                                            <div class="product_card__star-fill"></div>
                                        @else
                                            <div class="product_card__star"></div>
                                        @endif

                                    @endfor
                                </div>

                                <span class="product_card__reviews-date">{{ $review->created_at->format('d-m-Y h:i') }}</span>

                                <p class="product_card__reviews-text">{{ $review->message }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <a href="javascript:void(1)" data-item="{{ $product->id }}" class="product_card__reviews-send-button">Оставить отзыв</a>
        </div>

        <x-best-seller />

    </div>


@endsection
