<div class="section-head">
    <h3 class="section-title">Sản phẩm nổi bật</h3>
</div>
<div class="section-detail">
    <ul class="list-item">
        @foreach ($products as $product)
        <li>
            <a href="/san-pham/{{$product->id}}-{{\Str::slug($product->name)}}.html" title="" class="thumb">
                <img src="{{ optional($product->image)->thumb }}">
            </a>
            <a href="/san-pham/{{$product->id}}-{{\Str::slug($product->name)}}.html" title="" class="product-name">{{ $product->name }}</a>
            <div class="price">
                <span class="new">{{ \App\Helpers\Helper::currencyFormat($product->price_sale) }}</span>
                <span class="old">{{ \App\Helpers\Helper::currencyFormat($product->price) }}</span>
            </div>
            <div class="action clearfix">
                <a href="/add-cart/{{$product->id}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                <a href="/checkout/{{$product->id}}" title="" class="buy-now fl-right">Mua ngay</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>