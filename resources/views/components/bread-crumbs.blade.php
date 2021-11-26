<ul class="breadcrumb">
    <li><a href="/">Главная</a></li>

    @if(isset($category))
        <li><a href="{{url('/categories/' . $category->slug )}}">{{$category->title}}</a></li>
        <li>{{ $last->title }}</li>
    @endif

    @if(isset($product))
        <li><a href="/catalog">Каталог</a></li>
        <li><a href="{{url('/categories/' . $subcat->slug)}}">{{ $subcat->title }}</a></li>
        <li>{{ Str::limit($product->title, 30)}}</li>
    @endif

    @if(isset($current))
        <li>{{$current->title}}</li>
    @endif
    @if(request()->segment(1) == 'catalog')
        <li>Каталог</li>
    @endif
    @if(request()->segment(1) == 'sale')
        <li><a href="/catalog">Каталог</a></li>
        <li>Распрадажа</li>
    @endif

    @if(request()->segment(1) == 'provider')
        <li><a href="/catalog">Каталог</a></li>
        <li>Поставщикам</li>
    @endif

    @if(request()->segment(1) == 'about')
        <li><a href="/catalog">Каталог</a></li>
        <li>О компании</li>
    @endif

    @if(request()->segment(1) == 'question')
        <li><a href="/catalog">Каталог</a></li>
        <li>Задать вопрос</li>
    @endif


    @if(request()->segment(1) == 'delivery')
        <li><a href="/catalog">Каталог</a></li>
        <li>Доставка</li>
    @endif


    @if(request()->segment(1) == 'police')
        <li><a href="/catalog">Каталог</a></li>
        <li>Политика безопастности</li>
    @endif


    @if(request()->segment(1) == 'basket')
        <li><a href="/catalog">Каталог</a></li>
        <li>Корзина</li>
    @endif


    @if(request()->segment(1) == 'register')
        <li><a href="/catalog">Каталог</a></li>
        <li>Регистрация</li>
    @endif

    @if(request()->segment(1) == 'contact')
        <li><a href="/catalog">Каталог</a></li>
        <li>Контакты</li>
    @endif

    @if(request()->segment(1) == 'search')
        <li><a href="/catalog">Каталог</a></li>
        <li>Поиск</li>
    @endif

    @if(request()->segment(1) == 'favorite')
        <li><a href="/catalog">Каталог</a></li>
        <li>Избранное</li>
    @endif
</ul>
