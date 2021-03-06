@extends('layouts.index')


@section('description', $meta->descriptions)

@section('keywords', $meta->keywords)
@section("canonical", url("/" . $meta->slug . ".php"))
@section('title', 'MaksProm - ' . $meta->title)


@section('content')
    <div class="catalog container">

        <x-bread-crumbs />

        <div id="category1" class="catalog__products catalog__products-active">
            <div class="catalog__products-wrapper">
                @forelse($products as $product)
                    <div class="bestsellers__block">
                        <div class="bestsellers__block-wrapper">
                            <img src="{{ asset("storage/products/" . $product->img) }}" alt="" class="bestsellers__block-img">
                            @if(isset($product->discount))
                                <span class="bestsellers__block-stock">-{{ $product->discount }}%</span>
                            @endif
                            <div class="bestsellers__block-circle-buttons">
                                <a href="javascript:void(0)" class="bestsellers__block-circle-button-favorite {{ isset(session()->get('favorite')[$product->id]) && session()->get('favorite')[$product->id]['id'] == $product->id  ? 'active' : '' }}"></a>
                            </div>

                            <h2 class="bestsellers__block-title">{{ $product->title }}</h2>

                            <div class="bestsellers__block-prices">
                                <p class="bestsellers__block-price-new"><strong class="price-new_strong">{{ $product->price }}</strong><span class="price-new_rub">₽</span></p>
                            </div>

                            <div class="bestsellers__block-buttons">
                                <a href="{{ url('/product/' . $product->slug) }}" class="bestsellers__block-button-buy-click">Подробнее</a>
                                <a href="javascript:void(0)" data-id="{{ $product->id }}" class="bestsellers__block-button-buy">Купить</a>
                            </div>

                        </div>
                    </div>
                @empty
                    <div style="height: 130px">
                        <span class="order-forming__products-desc">У данной категории нет продуктов</span>
                    </div>
                @endforelse
            </div>

            {{ $products->links('pages.paginate-catalog') }}

        </div>
    </div>
@endsection
