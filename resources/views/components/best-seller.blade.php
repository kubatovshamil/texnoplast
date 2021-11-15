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
