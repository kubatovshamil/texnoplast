<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Texnoplast Site</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap3.grid.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/fonts/font.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- JQuery -->
		<script src="{{ asset('libs/jquery/3.5.1/jquery.min.js') }}"></script>
		<!-- arcticModal -->
		<script src="{{ asset('libs/arcticmodal/jquery.arcticmodal-0.3.min.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('libs/arcticmodal/jquery.arcticmodal-0.3.css') }}">
		<!-- Tiny Slider -->
		<link rel="stylesheet" href="{{ asset('libs/tiny-slider/tiny-slider.css') }}">
		<script src="{{ asset('libs/tiny-slider/tiny-slider.js') }}"></script>
		<!-- JQuery-Lighter -->
		<link rel="stylesheet" href="{{ asset('libs/jquery-lighter/jquery.lighter.css') }}">
		<script src="{{ asset('libs/jquery-lighter/jquery.lighter.js') }}"></script>
		<script src="{{asset('js/slider.js')}}"></script>
	</head>
	<body>
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"><a href="/" class="header__logo"><img class="header__logo_image" src="img/logo.png" alt="" /></a></div>
					<div class="col-lg-10 col-md-10 col-sm-9">
						<div class="header__row-top">
							<div class="header__block header__block__name_menu">
								<a href="" class="header__menu-link">О компании</a><a href="" class="header__menu-link">Самовывоз</a>
								<a href="" class="header__menu-link">Доставка</a><a href="" class="header__menu-link">Оплата</a>
								<a href="" class="header__menu-link">Контакты</a>
							</div>
							<div class="header__block header__block__name_profile">
								<a href="personal.php" class="header__profile-link">Личный кабинет</a>
							</div>
						</div>
						<div class="header__row-bottom">
							<div class="header__block header__block__name_search">
								<form class="header__search">
									<input type="text" class="header__search-input" placeholder="Поиск"/>
									<input type="submit" class="header__search-button" value=""/>
								</form>
							</div>

							<div class="header__block header__block__name_actions mobile_menu">
								<div class="header__block header__actions-block">
									<a href="javascript:void(0)" class="header__actions-block header__actions-block__name_burger-menu"></a>
								</div>

								<div class="header__block header__actions-block">
									<a href="contacts.php" class="header__actions-block header__actions-block__name_contacts">Контакты</a>
								</div>
							</div>

							<div class="header__block header__block__name_contacts">
								<div class="header__block header__block__name_contact1">
									<div class="header__contact1 header__contact1__name_email"><a href="mailto:info@loftbox.ru" class="header__contact-email-link">
										info@loftbox.ru
									</a></div>
									<div class="header__contact2 header__contact2__name_address">г.Белгород, ул.Гоголя, д.8а, оф.1</div>
								</div>
								<div class="header__block header__block__name_contact2">
									<div class="header__contact3 header__contact3__name_phone1">
										<a href="tel:+74722808080" class="header__contact-phone header__contact-phone__name_phone1">+7 (4722) 80-80-80</a>
									</div>
									<div class="header__contact4 header__contact4__name_phone2">
										<a href="tel:+74722808080" class="header__contact-phone header__contact-phone__name_phone2">+7 (4722) 80-80-80</a>
									</div>
								</div>
							</div>
							<div class="header__block header__block__name_actions">
								<div class="header__block header__actions-block mobile_search">
									<a href="javascript:void(0)" class="header__actions-block header__actions-block__name_search"></a>
									<div class="modal__modal-box">
										<div class="search-modal" id="Search">
											<form class="header__search header__search-mobile">
												<input autofocus type="text" class="header__search-input" placeholder="Поиск"/>
												<input type="submit" class="header__search-button" value=""/>
											</form>
										</div>
									</div>
								</div>

								<div class="header__block header__actions-block mobile_profile">
									<a href="personal.php" class="header__actions-block header__actions-block__name_profile"></a>
								</div>

								<div class="header__block header__actions-block">
									<a href="favorites.php" class="header__actions-block header__actions-block__name_favorites"><span class="favorites_msg">2</span></a>
								</div>

								<div class="header__block header__actions-block">
									<a href="basket.php" class="header__actions-block header__actions-block__name_basket"><span class="basket_msg">2</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="second-menu">
			<div class="container second-item__name_dropdown__relative">
				<div class="second-menu__item second-item__name_dropdown">
					<a class="second-menu__link burger" href="#">каталог товаров</a>
				</div>

				<div class="second-item__name_dropdown-menu">
					<div class="second-item__name_dropdown__left">
						<a class="second-item__name_dropdown-left__item active" href="#">Столы</a>
						<a class="second-item__name_dropdown-left__item" href="#">Стулья, табуреты</a>
						<a class="second-item__name_dropdown-left__item" href="#">Стеллажи</a>
						<a class="second-item__name_dropdown-left__item" href="#">Комоды, консоли</a>
						<a class="second-item__name_dropdown-left__item" href="#">Навесные полочки</a>
						<a class="second-item__name_dropdown-left__item" href="#">Вешала</a>
						<a class="second-item__name_dropdown-left__item" href="#">Диваны, кресла</a>
						<a class="second-item__name_dropdown-left__item" href="#">Каркасы, подстолья</a>
						<a class="second-item__name_dropdown-left__item" href="#">Светильники</a>
						<a class="second-item__name_dropdown-left__item" href="#">Для бизнеса</a>
						<a class="second-item__name_dropdown-left__item" href="#">Фурнитура</a>
						<a class="second-item__name_dropdown-left__item" href="#">Аксессуары и предметы интерьера</a>
					</div>

					<div class="second-item__name_dropdown__right">
						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Барные столы</p>
							</a>
						</div>

						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Обеденные столы</p>
							</a>
						</div>
						
						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Письменные столы</p>
							</a>
						</div>
						
						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Журнальные столы</p>
							</a>
						</div>
						
						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Столики для кафе и баров</p>
							</a>
						</div>
						
						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Прикроватные столики</p>
							</a>
						</div>

						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Прикроватные столики</p>
							</a>
						</div>

						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Прикроватные столики</p>
							</a>
						</div>

						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Прикроватные столики</p>
							</a>
						</div>

						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Прикроватные столики</p>
							</a>
						</div>

						<div class="second-item__name_dropdown__block__wrapper">
							<a href="#" class="second-item__name_dropdown__block">
								<img class="second-item__name_dropdown__block__img" src="img/block.svg" alt="img">
								<p class="second-item__name_dropdown__block__title">Прикроватные столики</p>
							</a>
						</div>
					</div>
				</div>

				<div class="second-menu__item responsive_width">
					<a class="second-menu__link armchair" href="#">индивидуальный заказ</a>
				</div>
				
				<div class="second-menu__item">
					<a class="second-menu__link calc" href="#">онлайн калькулятор</a>
				</div>
				
				<div class="second-menu__item">
					<a class="second-menu__link cart" href="#">мебель в наличии</a>
				</div>
				
				<div class="second-menu__item">
					<a class="second-menu__link sale" href="#">распродажа</a>
				</div>
			</div>
		</div>

		@yield('content')

		<div class="footer">
			<div class="container">
				<div class="footer__block">
					<div class="footer__logo">
						<a href="/"><img class="footer__logo-img" src="img/icons/loftlogo__white 1.svg" alt="footer logo"></a>
						
						<p class="footer__copyright">© Интернет-магазин лофт-мебели, 2018-2020</p>
						
						<div class="footer__pay-system">
							<div class="footer__pay-system_name_mcard"></div>
							<div class="footer__pay-system_name_mir"></div>
							<div class="footer__pay-system_name_visa"></div>
							<div class="footer__pay-system_name_ya-money"></div>
						</div>
					</div>
				</div>

				<div class="footer__block footer__block-margin">
					<div class="footer__menu">
						<ul class="footer__vertical-menu">
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Доставка</a></li>
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Оплата</a></li>
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Гарантия</a></li>
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Обмен и возврат</a></li>
						</ul>

						<ul class="footer__vertical-menu">
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Контакты и шоурумы</a></li>
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">О компании</a></li>
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Карьера</a></li>
							<li class="footer__vertical-menu__item"><a class="footer__vertical-menu__link" href="#">Помощь</a></li>
						</ul>

						<div class="footer__contacts">
							<a href="tel:+74722808080" class="footer__contacts-phone">+7 (4722) 80-80-80</a>
							<p class="footer__contacts_desc">Для звонков с любой точки мира</p>

							<a href="javascript:void(0)" class="footer__contacts_button">Заказать звонок</a>

							<div class="footer__contacts_socials">
								<a class="footer__contacts-social footer__contacts-social_name__facebook" href="#"></a>
								<a class="footer__contacts-social footer__contacts-social_name__instagram" href="#"></a>
								<a class="footer__contacts-social footer__contacts-social_name__twitter" href="#"></a>
								<a class="footer__contacts-social footer__contacts-social_name__pinterest" href="#"></a>
							</div>
						</div>
					</div>

					<div class="footer__offerts">
						<a class="footer__offerts-link" href="#">Политика безопастности платежей</a>
						<a class="footer__offerts-link" href="#">Данные публичной оферты</a>
						<a class="footer__offerts-link" href="#">Политка в отношении обработки перссональных данных</a>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>