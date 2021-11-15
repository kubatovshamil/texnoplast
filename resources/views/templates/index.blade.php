@extends('layout')
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

	<div class="bestsellers container">
		<div class="bestsellers__header">
			<h1 class="bestsellers__header-title">Хиты продаж</h1>

			<div class="bestsellers__sliders">
				<a href="javascript:void(0)" class="bestsellers__slider-arrow bestsellers__slider-arrow-left"></a>
				<a href="javascript:void(0)" class="bestsellers__slider-arrow bestsellers__slider-arrow-right"></a>
			</div>
		</div>

		<div class="bestsellers__blocks-wrapper">
            @foreach($hits as $hit)
			    <div class="bestsellers__block-slide">
				<div class="bestsellers__block">
					<div class="bestsellers__block-wrapper">
						<img src="{{ asset("storage/products/" . $hit['img']) }}" alt="" class="bestsellers__block-img">
						<span class="bestsellers__block-stock">-{{ round(($hit->discount - $hit->price) * 100 / $hit->discount) }}%</span>
						<div class="bestsellers__block-circle-buttons">
							<a href="javascript:void(0)" class="bestsellers__block-circle-button-favorite"></a>
						</div>

						<h2 class="bestsellers__block-title">{{ $hit->title }}</h2>

						<div class="bestsellers__block-prices">
							<p class="bestsellers__block-price-old">{{ $hit->discount }}₽</p>
							<p class="bestsellers__block-price-new">от <strong class="price-new_strong">{{ $hit->price }}</strong><span class="price-new_rub">₽</span></p>
						</div>

						<div class="bestsellers__block-buttons">
							<a href="javascript:void(0)" class="bestsellers__block-button-buy-click">Купить в 1 клик</a>
							<a href="javascript:void(0)" class="bestsellers__block-button-buy">Купить</a>
						</div>

					</div>
				</div>
			</div>
            @endforeach

		</div>
	</div>

	<div class="advatages container">
		<div class="advantages__header">
			<h1 class="advantages__header-title">Наши преимущества</h1>
		</div>

		<div class="advantages__blocks">
			<div class="advantages__block">
				<h1 class="advantages__block-title advantages__shipping-title">Бесплатная доставка</h1>
				<p class="advantages__block-desc">по Белгороду</p>

				<a href="#" class="advantages__block-button">Смотреть</a>
			</div>

			<div class="advantages__block">
				<h1 class="advantages__block-title advantages__order-title">Ищите эксклюзив?</h1>
				<p class="advantages__block-desc">Изготовление мебели по индивидуальному заказу</p>

				<a href="#" class="advantages__block-button">Смотреть</a>
			</div>

			<div class="advantages__block">
				<h1 class="advantages__block-title advantages__sales-title">Скидка 10%</h1>
				<p class="advantages__block-desc">на всю мебель</p>

				<a href="#" class="advantages__block-button">Смотреть</a>
			</div>
		</div>
	</div>

	<div class="contacts-and-forms container">
		<div class="contacts-and-forms__numbers">
			<h1 class="contacts-and-forms__numbers-title">Остались вопросы? Звоните!</h1>

			<span class="contacts-and-forms__numbers-work">Пн-Пт: 10-19 Сб: 12-17 (МСК)</span>

			<a href="#" class="contacts-and-forms__numbers-phone1">+7 (4722) 80-30-30</a>
			<a href="#" class="contacts-and-forms__numbers-phone2">+7 (4722) 80-30-30</a>
		</div>

		<div class="contacts-and-forms__socials">
			<div class="contacts-and-forms__socials-icons">
				<h1 class="contacts-and-forms__socials-title">Присоеденяйтесь к нам :</h1>

				<a href="#" class="contacts-and-forms__socials-icon__name_telegram"></a>
				<a href="#" class="contacts-and-forms__socials-icon__name_instagram"></a>
				<a href="#" class="contacts-and-forms__socials-icon__name_facebook"></a>
			</div>

			<div class="contacts-and-forms__socials-blocks">

				<div class="contacts-and-forms__socials-block__name_instagram">
					<h2 class="contacts-and-forms__socials-block__name_instagram-title">Мы в Инстаграм</h2>

					<div class="contacts-and-forms__socials-block__name_instagram-avatar"></div>

					<div class="contacts-and-forms__socials-block__name_instagram-info">
						<div class="contacts-and-forms__socials-block__name_instagram-profile">
							<div class="contacts-and-forms__socials-block__name_instagram-block">
								<p class="contacts-and-forms__socials-block__name_instagram-pub_count">21</p>
								<p class="contacts-and-forms__socials-block__name_instagram-pub-desc">публикаций</p>
							</div>

							<div class="contacts-and-forms__socials-block__name_instagram-block">
								<p class="contacts-and-forms__socials-block__name_instagram-followers_count">256</p>
								<p class="contacts-and-forms__socials-block__name_instagram-followers-desc">подписчиков</p>
							</div>

							<div class="contacts-and-forms__socials-block__name_instagram-block">
								<p class="contacts-and-forms__socials-block__name_instagram-follows_count">653</p>
								<p class="contacts-and-forms__socials-block__name_instagram-follows-desc">подписки</p>
							</div>
						</div>

						<a href="#" class="contacts-and-forms__socials-block__name_instagram-subscribe">Подписаться</a>
					</div>
				</div>

				<div class="contacts-and-forms__socials-block__name_facebook">
					<h2 class="contacts-and-forms__socials-block__name_facebook-title">Мы в Фейсбук</h2>

					<div class="contacts-and-forms__socials-block__name_facebook-avatar"></div>

					<div class="contacts-and-forms__socials-block__name_facebook-info">
						<div class="contacts-and-forms__socials-block__name_facebook-profile">
							<div class="contacts-and-forms__socials-block__name_facebook-block">
								<p class="contacts-and-forms__socials-block__name_facebook-pub_count">21</p>
								<p class="contacts-and-forms__socials-block__name_facebook-pub-desc">публикаций</p>
							</div>

							<div class="contacts-and-forms__socials-block__name_facebook-block">
								<p class="contacts-and-forms__socials-block__name_facebook-followers_count">256</p>
								<p class="contacts-and-forms__socials-block__name_facebook-followers-desc">подписчиков</p>
							</div>

							<div class="contacts-and-forms__socials-block__name_facebook-block">
								<p class="contacts-and-forms__socials-block__name_facebook-follows_count">653</p>
								<p class="contacts-and-forms__socials-block__name_facebook-follows-desc">подписки</p>
							</div>
						</div>

						<a href="#" class="contacts-and-forms__socials-block__name_instagram-subscribe">Подписаться</a>
					</div>
				</div>

			</div>
		</div>

	</div>


    <div class="modal__modal-box">
        <div class="box-modal" id="Modal">
            <div class="box-modal_close arcticmodal-close">&#10006;</div>

            <p class="modal__desc">Товар добавлен в корзину!</p>

            <div class="modal__buttons">
                <a class="modal__button bag" href="order_forming.php">Перейти в корзину</a>
                <div class="modal__button continue arcticmodal-close">Продолжить покупки</div>
            </div>
        </div>
    </div>

@endsection
