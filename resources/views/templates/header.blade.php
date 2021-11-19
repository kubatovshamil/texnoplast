<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"><a href="/" class="header__logo"><img class="header__logo_image" src="{{asset('/img/logo.png')}}" alt="logo not found" /></a></div>
      <div class="col-lg-10 col-md-10 col-sm-9">
        <div class="header__row-top">
          <div class="header__block header__block__name_menu">
              <a href="/about" class="header__menu-link">О компании</a>
              <a href="/question" class="header__menu-link">Задать-Вопрос</a>
              <a href="/delivery" class="header__menu-link">Доставка</a>
          </div>
          <div class="header__block header__block__name_profile">
            <a href="javascript:void(1)" class="header__profile-link">Личный кабинет</a>
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
              <div class="header__contact1 header__contact1__name_email"><a href="mailto:info@maksprom.ru" class="header__contact-email-link">
                info@maksprom.ru
              </a></div>
              <div class="header__contact2 header__contact2__name_address">г.Калуга, пер. Аэропортский д.11</div>
            </div>
            <div class="header__block header__block__name_contact2">
              <div class="header__contact3 header__contact3__name_phone1">
                <a href="tel:+74722808080" class="header__contact-phone header__contact-phone__name_phone1">+7 (800) 300-89-93</a>
              </div>
              <div class="header__contact4 header__contact4__name_phone2">
                <a href="tel:+74722808080" class="header__contact-phone header__contact-phone__name_phone2">+7 (980) 715-35-71</a>
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
              <a href="javascript:void(1)" class="header__actions-block header__actions-block__name_profile"></a>
            </div>

            <div class="header__block header__actions-block">
              <a href="/favorite" class="header__actions-block header__actions-block__name_favorites"><span class="favorites_msg">2</span></a>
            </div>

            <div class="header__block header__actions-block">
              <a href="/basket" class="header__actions-block header__actions-block__name_basket"><span class="basket_msg">2</span></a>
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
            <a class="second-menu__link burger" href="{{ "/catalog" }}">каталог товаров</a>
        </div>

        <div class="second-item__name_dropdown-menu">
            <div class="second-item__name_dropdown__left">
                @foreach($categories as $k => $category)
                    <a class="second-item__name_dropdown-left__item {{ $k == 0 ? 'active' : ''}} " href="{{ "/categories/" . $category['slug'] }}">{{$category['title']}}</a>
                @endforeach
            </div>
            @foreach($categories as $k => $category)
                <div class="second-item__name_dropdown__right {{ $k == 0 ? 'show' : ''}}">
                    @foreach($category['_children'] as $child)
                            <div class="second-item__name_dropdown__block__wrapper">
                                <a href="{{ "/categories/". $category['slug'] . "/" . $child['slug'] }}" class="second-item__name_dropdown__block">
                                    <img class="second-item__name_dropdown__block__img" src="{{ asset("storage/category/" . $child['img']) }}" width="100" height="100" alt="img">
                                    <p class="second-item__name_dropdown__block__title">{{$child['title']}}</p>
                                </a>
                            </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="second-menu__item responsive_width">
            <a class="second-menu__link armchair" href="javascript:void(1)">индивидуальный заказ</a>
        </div>

        <div class="second-menu__item">
            <a class="second-menu__link calc" href="/provider">Поставщикам</a>
        </div>

        <div class="second-menu__item">
            <a class="second-menu__link cart" href="/catalog">Материал в наличии</a>
        </div>

        <div class="second-menu__item">
            <a class="second-menu__link sale" href="/sale">распродажа</a>
        </div>
    </div>
</div>
