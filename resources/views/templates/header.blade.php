<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"><a href="/" class="header__logo"><img class="header__logo_image" src="img/logo.png" alt="logo not found" /></a></div>
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
              <a href="javascript:void(0)" id="burger-menu" class="header__actions-block header__actions-block__name_burger-menu"></a>
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
        <div class="mobile-menu">

            <ul class="mobile-menu____unit">
                <li class="mobile-menu__unit__item">
                    <a class="mobile-menu__unit__item__link" href="#" title="Главная">
                        <span>Главная</span>
                    </a>
                </li>
                <li class="mobile-menu__unit__item">
                    <a class="mobile-menu__unit__item__link parrent" href="https://www.google.ru">
                        <span>Каталог</span>
                        <span class="arrow">
								<i class="svg svg_triangle_right"></i>
                        </span>
                    </a>
                    <ul class="mobile-menu____unit dropdown">
                        @foreach($categories as $k => $category)
                            <li class="mobile-menu__unit__item">
                                <a class="mobile-menu__unit__item__link  {{ isset($category['_children']) ? 'parent' :''  }}" href="{{ "/categories" . $category['slug']}}">
                                    <span>{{$category['title']}}</span>
                                    @if(isset($category['_children']))
                                        <span class="arrow">
                                            <i class="svg svg_triangle_right"></i>
                                        </span>
                                    @endif
                                </a>
                                @if(isset($category['_children']))
                                    <ul class="mobile-menu____unit dropdown">
                                        @foreach($category['_children'] as $child)
                                            <li class="mobile-menu__unit__item">
                                                <a class="mobile-menu__unit__item__link" href="{{ "/categories" . $child['slug'] }}">
                                                    <span>{{$child['title']}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="mobile-menu__unit__item">
                    <a class="mobile-menu__unit__item__link" href="#">
                        <span>Распрадажа</span>
                    </a>
                </li>
            </ul>

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
                @foreach($categories as $k => $category)
                    <a class="second-item__name_dropdown-left__item {{ $k == 0 ? 'active' : ''}} " href="#">{{$category['title']}}</a>
                @endforeach
            </div>
            @foreach($categories as $k => $category)
                <div class="second-item__name_dropdown__right {{ $k == 0 ? 'show' : ''}}">
                    @foreach($category['_children'] as $child)
                            <div class="second-item__name_dropdown__block__wrapper">
                                <a href="#" class="second-item__name_dropdown__block">
                                    <img class="second-item__name_dropdown__block__img" src="{{ asset("storage/category/" . $child['img']) }}" width="100" height="100" alt="img">
                                    <p class="second-item__name_dropdown__block__title">{{$child['title']}}</p>
                                </a>
                            </div>
                    @endforeach
                </div>
            @endforeach
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
