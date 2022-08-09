@include('header')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    @foreach ($sliders as $slider)
                    <div class="item">
                        <a href="{{ $slider->url }}">
                            <img src="{{ $slider->thumb }}" alt="{{ $slider->name }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="template/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="template/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="template/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="template/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="template/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-05.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">Laptop Lenovo IdeaPad 120S</a>
                            <div class="price">
                                <span class="new">5.190.000đ</span>
                                <span class="old">6.190.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-08.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">Samsung Galaxy S8 Plus</a>
                            <div class="price">
                                <span class="new">20.490.000đ</span>
                                <span class="old">22.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-07.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">Laptop Acer Aspire ES1</a>
                            <div class="price">
                                <span class="new">6.390.000đ</span>
                                <span class="old">7.390.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-10.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">Sony Xperia XZ Premium</a>
                            <div class="price">
                                <span class="new">17.990.000</span>
                                <span class="old">20.990.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-06.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">Laptop Asus E402NA</a>
                            <div class="price">
                                <span class="new">5.990.000đ</span>
                                <span class="old">6.990.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-pro-09.png">
                            </a>
                            <a href="?page=detail_product" title="" class="product-name">IPhone 7 128GB</a>
                            <div class="price">
                                <span class="new">18.990.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @foreach ($productCats as $productCat)
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">{{ $productCat->name }}</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @php
                        $t = 0;
                        @endphp
                        @foreach ($products as $product)
                        @if ($t < 8)
                        @if (in_array($product->cat_id, \App\Helpers\Helper::getArrayCatId($allProductCats, $productCat->id)))
                        @php
                        $t++;
                        @endphp
                        <li>
                            <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name) }}.html" title="" class="thumb">
                                <img src="{{ optional($product->image)->thumb }}">
                            </a>
                            <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name) }}.html" title="" class="product-name">{{ $product->name }}</a>
                            <div class="price">
                                <span class="new">{{ \App\Helpers\Helper::currencyFormat($product->price_sale) }}</span>
                                <span class="old">{{ \App\Helpers\Helper::currencyFormat($product->price) }}</span>
                            </div>
                            <div class="action clearfix">
                                <a href="/add-cart/{{$product->id}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="/checkout/{{$product->id}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        @endif
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="sidebar fl-left">
            @include('product_cat')
            @include('product_hot')
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="https://github.com/davephan09" title="" class="thumb">
                        <img src="public/images/david_github.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')