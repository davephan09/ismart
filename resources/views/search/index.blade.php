@include('header')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="/" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Kết quả tìm kiếm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Kết quả tìm kiếm</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form action="">
                                @csrf
                                <select name="sort" id="sort">
                                    <option value="{{Request::url()}}?sort_by=name">Sắp xếp theo</option>
                                    <option value="{{Request::url()}}?sort_by=a-z">-- Từ A-Z --</a></option>
                                    <option value="{{Request::url()}}?sort_by=z-a">-- Từ Z-A --</option>
                                    <option value="{{Request::url()}}?sort_by=desc">Giá cao xuống thấp</option>
                                    <option value="{{Request::url()}}?sort_by=asc">Giá thấp đến cao</option>
                                </select>
                                <!-- <button type="submit">Lọc</button> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($products as $product)
                        <li>
                            <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name) }}.html" title="" class="thumb">
                                <!-- @foreach ($product->images as $index => $image)
                                @if ($index == 0) -->
                                <img src="{{ $product->images()->first()->thumb }}">
                                <!-- @endif
                                @endforeach -->
                            </a>
                            <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name) }}.html" title="" class="product-name">{{ $product->name }}</a>
                            <div class="price">
                                <span class="new">{{ \App\Helpers\Helper::currencyFormat($product->price_sale) }}</span>
                                <span class="old">{{ \App\Helpers\Helper::currencyFormat($product->price) }}</span>
                            </div>
                            <div class="action clearfix">
                                <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <!-- <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul> -->
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            @include('product_cat')
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="GET" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r_price" id="price-sort" value="1"></td>
                                    <td>Dưới 1.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r_price" id="price-sort" value="2"></td>
                                    <td>1.000.000đ - 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r_price" id="price-sort" value="3"></td>
                                    <td>5.000.000đ - 10.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r_price" id="price-sort" value="4"></td>
                                    <td>10.000.000đ - 20.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r_price" id="price-sort" value="5"></td>
                                    <td>Trên 20.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="submit" id="button" value="Lọc"/>
                    </form>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="/template/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')