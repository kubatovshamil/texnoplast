<ul class="breadcrumb">
    <li><a href="/">Главная</a></li>

    @if(isset($category))
        <li><a href="/catalog.php">Каталог</a></li>
        <li><a href="{{url('/categories/' . $category->slug . '.php' )}}">{{$category->title}}</a></li>
        <li>{{ $last->title }}</li>
    @endif

    @if(isset($product))
        <li><a href="/catalog.php">Каталог</a></li>
        <li><a href="{{url('/categories/' . $subcat->slug . '.php')}}">{{ $subcat->title }}</a></li>
        <li>{{ Str::limit($product->title, 30)}}</li>
    @endif

    @if(isset($current))
        <li><a href="/catalog.php">Каталог</a></li>
        <li>{{$current->title}}</li>
    @endif
    @if(request()->segment(1) == 'catalog.php')
        <li>Каталог</li>
    @endif
    @if(request()->segment(1) == 'sale.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Распрадажа</li>
    @endif

    @if(request()->segment(1) == 'provider.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Поставщикам</li>
    @endif

    @if(request()->segment(1) == 'about.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>О компании</li>
    @endif

    @if(request()->segment(1) == 'question.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Задать вопрос</li>
    @endif


    @if(request()->segment(1) == 'delivery.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Доставка</li>
    @endif


    @if(request()->segment(1) == 'police.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Политика безопастности</li>
    @endif


    @if(request()->segment(1) == 'basket.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Корзина</li>
    @endif


    @if(request()->segment(1) == 'register.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Регистрация</li>
    @endif

    @if(request()->segment(1) == 'contact.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Контакты</li>
    @endif

    @if(request()->segment(1) == 'search.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Поиск</li>
    @endif

    @if(request()->segment(1) == 'favorite.php')
        <li><a href="/catalog.php">Каталог</a></li>
        <li>Избранное</li>
    @endif
</ul>
