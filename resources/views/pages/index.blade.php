@extends('layouts.index')

@section('description', 'MaksProm - Интернет-магазины для дома и сада, бытовой техники, инструментов, товаров для дома и многого другого.')
@section('keywords', ' макспром, пиломатериалы, древесно-плитные материалы, деревянная тара, поддоны, деревянные поддоны ')
@section("canonical", url("/"))
@section('title', 'MaksProm - интернет магазин')

@section('content')

	<div class="main-slider">

		<div class="main-slider__wrapper">

			<div class="main-slider__wrapper-item-1">
				<div class="container">
					<h1 class="main-slider__title">Деревянная тара</h1>
					<p class="main-slider__text">Расшифровка предлождения, одно<br>предложение из нескольких слов</p>

					<a href="/categories/derevyannaya-tara.php" class="main-slider__button">Подробнее</a>
				</div>
			</div>

			<div class="main-slider__wrapper-item-2">
				<div class="container">
					<h1 class="main-slider__title">Пиломатериалы</h1>
					<p class="main-slider__text">Расшифровка предлождения, одно<br>предложение из нескольких слов</p>

					<a href="/categories/pilomaterialy.php" class="main-slider__button">Подробнее</a>
				</div>
			</div>

			<div class="main-slider__wrapper-item-3">
				<div class="container">
					<h1 class="main-slider__title">Древесно-плитные <br>материалы</h1>
					<p class="main-slider__text">Расшифровка предлождения, одно<br>предложение из нескольких слов</p>

					<a href="/categories/drevesno-plitnye-materialy.php" class="main-slider__button">Подробнее</a>
				</div>
			</div>


		</div>


		<div class="main-slider__navigation container">
			<div class="main-slider__navigation-rect"></div>
			<div class="main-slider__navigation-rect"></div>
			<div class="main-slider__navigation-rect"></div>
		</div>
	</div>

    @if(count($categories) > 0)
        <div class="popular-category container">
            <div class="popular-category__header">
                <h1 class="popular-category__header-title">Популярные категории</h1>
            </div>

            <div class="popular-category__products">

                @foreach($categories as $category)
                    <div class="popular-category__products-block popular-category__products-block-tables">
                        <div class="popular-category__products-block-wrapper"></div>
                        <h2 class="popular-category__products-title">{{ $category['title'] }}</h2>
                        <img class="popular-category__products-img" src="{{ asset("storage/category/" . $category['img']) }}" alt="not found">
                        @if(isset($category['_children']))
                            @foreach($category['_children'] as $child)
                                <div class="popular-category__products-categories">
                                    <a href="{{ url('categories/'. $category['slug'] . '/' . $child['slug'] . '.php') }}" class="popular-category__products-category">{{$child['title']}}</a>
                                </div>
                            @endforeach
                        @endif
                        <a href="{{ url('categories', $category['slug'] . '.php') }}" class="popular-category__products-all">Все товары</a>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    <x-best-seller />

@endsection
