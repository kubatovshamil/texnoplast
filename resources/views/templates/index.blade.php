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

    <x-best-seller />


	<div class="contacts-and-forms container">
		<div class="contacts-and-forms__numbers">
			<h1 class="contacts-and-forms__numbers-title">Остались вопросы? Звоните!</h1>

			<span class="contacts-and-forms__numbers-work">ПН по ПТ: с 09:00 до 19:00 (МСК)</span>

			<a href="tel:78003008993" class="contacts-and-forms__numbers-phone1">+7 (800) 300-89-93</a>
			<a href="https://wa.me/79807153571" class="contacts-and-forms__numbers-phone2">+7 (980) 715-35-71</a>
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
