<div class="section" id="selling-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm mới</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
            @foreach ($products as $product)
            <li class="clearfix">
                <a href="/san-pham/{{$product->id}}-{{\Str::slug($product->name)}}.html" title="" class="thumb fl-left">
                    <img src="{{ optional($product->image)->thumb }}" alt="">
                </a>
                <div class="info fl-right">
                    <a href="/san-pham/{{$product->id}}-{{\Str::slug($product->name)}}.html" title="" class="product-name">{{ $product->name }}</a>
                    <div class="price">
                        <span class="new">{{ \App\Helpers\Helper::currencyFormat($product->price_sale) }}</span>
                        <span class="old">{{ \App\Helpers\Helper::currencyFormat($product->price) }}</span>
                    </div>
                    <a href="/add-cart/{{$product->id}}" title="" class="buy-now">Mua ngay</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>