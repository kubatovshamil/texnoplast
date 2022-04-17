@if(count($hits) > 0)
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
                            @if(isset($hit->discount))
                                <span class="bestsellers__block-stock">-{{$hit->discount }}%</span>
                            @endif
                            <div class="bestsellers__block-circle-buttons">
                                <a href="javascript:void(0)" data-id="{{ $hit->id }}"  class="elems bestsellers__block-circle-button-favorite {{ isset(session()->get('favorite')[$hit->id]) && session()->get('favorite')[$hit->id]['id'] == $hit->id  ? 'active' : '' }}"></a>
                            </div>

                            <h2 class="bestsellers__block-title">{{ $hit->title }}</h2>

                            <div class="bestsellers__block-prices">
                                <p class="bestsellers__block-price-new"><strong class="price-new_strong">{{ $hit->price }}</strong><span class="price-new_rub">₽</span></p>
                            </div>

                            <div class="bestsellers__block-buttons">
                                <a href="{{ url('/product/' . $hit['slug']) }}" class="bestsellers__block-button-buy-click">Подробнее</a>
                                <a href="javascript:void(0)" data-id="{{$hit->id}}" class="bestsellers__block-button-buy">Купить</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endif
