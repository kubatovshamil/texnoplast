@extends('layouts.index')
@section('content')

	<div class="main-slider">

		<div class="main-slider__wrapper">

			<div class="main-slider__wrapper-item">
				<div class="container">
					<h1 class="main-slider__title">ОТКРЫВАЕМ СЕЗОН<br>ПОДАРКОВ 1</h1>
					<p class="main-slider__text">Расшифровка предлождения, одно<br>предложение из нескольких слов</p>

					<a href="#" class="main-slider__button">Подробнее</a>
				</div>
			</div>

			<div class="main-slider__wrapper-item">
				<div class="container">
					<h1 class="main-slider__title">ОТКРЫВАЕМ СЕЗОН<br>ПОДАРКОВ 2</h1>
					<p class="main-slider__text">Расшифровка предлождения, одно<br>предложение из нескольких слов</p>

					<a href="#" class="main-slider__button">Подробнее</a>
				</div>
			</div>

			<div class="main-slider__wrapper-item">
				<div class="container">
					<h1 class="main-slider__title">ОТКРЫВАЕМ СЕЗОН<br>ПОДАРКОВ 3</h1>
					<p class="main-slider__text">Расшифровка предлождения, одно<br>предложение из нескольких слов</p>

					<a href="#" class="main-slider__button">Подробнее</a>
				</div>
			</div>

		</div>


		<div class="main-slider__navigation container">
			<div class="main-slider__navigation-rect"></div>
			<div class="main-slider__navigation-rect"></div>
			<div class="main-slider__navigation-rect"></div>
		</div>
	</div>

	<div class="popular-category container">
		<div class="popular-category__header">
			<h1 class="popular-category__header-title">Популярные категории</h1>
			<span class="popular-category__header-count">{{ $productQuantity }} товаров</span>
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
                                <a href="{{ url('categories', $child['slug']) }}" class="popular-category__products-category">{{$child['title']}}</a>
                            </div>
                        @endforeach
                    @endif
                    <a href="{{ url('categories', $category['slug']) }}" class="popular-category__products-all">Все товары</a>
                </div>
            @endforeach

		</div>
	</div>

    <x-best-seller />


@endsection
