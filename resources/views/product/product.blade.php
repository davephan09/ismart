@include('header')
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="/" title="">Trang chủ</a>
                    </li>
                    @if ($parentCat)
                    <li>
                        <a href="/danh-muc/{{ $parentCat->id }}-{{ \Str::slug($parentCat->name) }}.html" title="">{{ $parentCat->name }}</a>
                    </li>
                    @endif
                    <li>
                        <a href="/danh-muc/{{ $product->product_cat->id }}-{{ \Str::slug($product->product_cat->name) }}.html" title="">{{ $product->product_cat->name }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="{{ $mainImage->thumb }}" data-zoom-image="{{ $mainImage->thumb }}" />
                        </a>
                        <div id="list-thumb">
                            @foreach ($images as $image)
                            <a href="" data-image="{{ $image->thumb}}" data-zoom-image="{{ $image->thumb}}">
                                <img id="zoom" src="{{ $image->thumb }}" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="/template/images/img-pro-01.png" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="desc">
                            {!! $product->description !!}
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng</span>
                        </div>
                        <p class="price">{{ App\Helpers\Helper::currencyFormat($product->price_sale) }}</p>
                        <form action="/add-cart" method="POST">
                            <div id="num-order-wp">
                                <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                <input type="number" name="num-product" value="1" id="num-order">
                                <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            </div>
                            <input type="submit" title="Thêm giỏ hàng" value="Thêm giỏ hàng" class="add-cart" />
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    {!! $product->content !!}
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($productsMore as $productMore)
                        <li>
                            <a href="/san-pham/{{$productMore->id}}-{{\Str::slug($productMore->name)}}.html" title="" class="thumb">
                                @foreach ($productMore->images as $index => $image)
                                @if ($index == 0)
                                <img src="{{ $image->thumb }}">
                                @endif
                                @endforeach
                            </a>
                            <a href="/san-pham/{{$productMore->id}}-{{\Str::slug($productMore->name)}}.html" title="" class="product-name">{{ $productMore->name }}</a>
                            <div class="price">
                                <span class="new">{{ \App\Helpers\Helper::currencyFormat($productMore->price_sale) }}</span>
                                <span class="old">{{ \App\Helpers\Helper::currencyFormat($productMore->price) }}</span>
                            </div>
                            <div class="action clearfix">
                                <a href="/add-cart/{{$product->id}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="/checkout/{{$product->id}}" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            @include('product_cat')
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="/template/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')