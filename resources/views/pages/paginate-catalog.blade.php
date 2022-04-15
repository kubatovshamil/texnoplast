@if ($paginator->hasPages())
    <div class="catalog__products-pagination">
        <div class="catalog__products-pages">
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" class="catalog__pages-begin">В начало</a>
            <a href="{{ $paginator->previousPageUrl() }}" class="catalog__pages-prev">&#8249;</a>
        @endif

        <div class="catalog__pages-dots-wrapper-prev">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <a href="javascript:void(0)" class="catalog__pages-num-wrapper">{{ $element }}</a>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <a href="javascript:void(0)" class="catalog__pages-num current-page">{{ $page }}</a>
                        @else
                                <a href="{{$url}}" class="catalog__pages-num">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif

            @endforeach
        </div>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="catalog__pages-next">&#8250;</a>
                @if(request()->segment(1) == 'search')
                    <a href="{{ url()->full() . '&page=' . $paginator->lastPage() }}" class="catalog__pages-end">В конец</a>
                @else
                    <a href="{{ url()->current() . '?page=' . $paginator->lastPage() }}" class="catalog__pages-end">В конец</a>
                @endif
            @endif
    </div>
    </div>
@endif
