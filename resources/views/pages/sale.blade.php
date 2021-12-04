@extends('layouts.index')

@section('title', 'MaksPrm - старница распрадажа')


@section('content')
    <div class="sale container">

        <x-bread-crumbs />

        <h1 class="order-forming-title">Распрадажа</h1>

        @if(count($products) > 0)
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
                                    <a href="{{ url('/product/' . $product->slug) }}" class="bestsellers__block-button-buy-click">Подробнее</a>
                                    <a href="javascript:void(0)" data-id="{{ $product->id }}" class="bestsellers__block-button-buy">Купить</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $products->links('pages.paginate-catalog') }}

            </div>
        @else
            <div style="height: 130px">
                <span class="order-forming__products-desc">У вас нет добавленных продуктов</span>
            </div>
        @endif
    </div>
@endsection
