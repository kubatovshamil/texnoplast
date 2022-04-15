@if ($paginator->hasPages())
    <ul class="pagination float-right">
        @if ($paginator->onFirstPage())
            <li class="disabled page-item"><a class="btn disabled page-link" href="#">«</a></a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled page-item"><a class="btn disabled" href="#">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active page-item"><a class="btn disabled page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="disabled"><a class="btn disabled page-link">»</a></li>
        @endif
    </ul>
@endif
