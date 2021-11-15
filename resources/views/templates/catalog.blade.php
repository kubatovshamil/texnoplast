@extends('layout')

@section('content')

    <div class="catalog container">
        <div class="catalog__header">
            <h1 class="catalog__header-title">Каталог товаров</h1>

            <span class="catalog__header-count">{{ $productQuantity }} товаров</span>
        </div>

        <div id="category1" class="catalog__products catalog__products-active">
            <div class="catalog__products-wrapper">
                @foreach($products as $product)
                    <div class="bestsellers__block">
                    <div class="bestsellers__block-wrapper">
                        <img src="{{ asset("storage/products/" . $product->img) }}" alt="" class="bestsellers__block-img">
                        <span class="bestsellers__block-stock">-{{ round(($product->discount - $product->price) * 100 / $product->discount) }}%</span>
                        <div class="bestsellers__block-circle-buttons">
                            <a href="javascript:void(0)" class="bestsellers__block-circle-button-favorite"></a>
                        </div>

                        <h2 class="bestsellers__block-title">{{ $product->title }}</h2>

                        <div class="bestsellers__block-prices">
                            <p class="bestsellers__block-price-old">{{ $product->discount }}₽</p>
                            <p class="bestsellers__block-price-new">от <strong class="price-new_strong">{{ $product->price }}</strong><span class="price-new_rub">₽</span></p>
                        </div>

                        <div class="bestsellers__block-buttons">
                            <a href="javascript:void(0)" class="bestsellers__block-button-buy-click">Купить в 1 клик</a>
                            <a href="javascript:void(0)" class="bestsellers__block-button-buy">Купить</a>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            <div class="catalog__products-pagination">
                <div class="catalog__products-pages">
                    <a href="javascript:void(0)" class="catalog__pages-begin">В начало</a>
                    <a href="javascript:void(0)" class="catalog__pages-prev">&#8249;</a>

                    <div class="catalog__pages-dots-wrapper-prev"></div>

                    <div class="catalog__pages-num-wrapper"></div>

                    <div class="catalog__pages-dots-wrapper-next"></div>

                    <a href="javascript:void(0)" class="catalog__pages-next">&#8250;</a>
                    <a href="javascript:void(0)" class="catalog__pages-end">В конец</a>
                </div>

                <a href="javascript:void(0)" class="catalog__products-scrollup">Наверх</a>
            </div>
        </div>

        <a href="javascript:void(0)" class="see__more">Показать еще</a>


        <div class="bestsellers container">
            <div class="bestsellers__header">
                <h1 class="bestsellers__header-title">Хиты продаж</h1>

                <div class="bestsellers__sliders">
                    <a href="javascript:void(0)" class="bestsellers__slider-arrow bestsellers__slider-arrow-left"></a>
                    <a href="javascript:void(0)" class="bestsellers__slider-arrow bestsellers__slider-arrow-right"></a>
                </div>
            </div>

            <x-best-seller />

        </div>
    </div>

@endsection
