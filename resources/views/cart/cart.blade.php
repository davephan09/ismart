@include('header')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="/" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="/carts" title="">Giỏ hàng của tôi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @php
    $total = 0;
    @endphp
    <form method="POST">
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        @php
                            $price = $product->price_sale;
                            $priceEnd = $price * $carts[$product->id];
                            $total += $priceEnd;
                        @endphp
                        <tr>
                            <td>{{ $product->code }}</td>
                            <td>
                                <a href="san-pham/{{$product->id}}-{{\Str::slug($product->name)}}.html" title="" class="thumb">
                                    <img src="{{ $product->images()->first()->thumb }}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="san-pham/{{$product->id}}-{{\Str::slug($product->name)}}.html" title="" class="name-product">{{ $product->name }}</a>
                            </td>
                            <td>{{ App\Helpers\Helper::currencyFormat($product->price_sale) }}</td>
                            <td>
                                <input type="number" name="num-product[{{$product->id}}]" value="{{ $carts[$product->id] }}" class="num-order">
                            </td>
                            <td>{{ App\Helpers\Helper::currencyFormat($priceEnd) }}</td>
                            <td>
                                <a href="carts/delete/{{$product->id}}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span>{{ App\Helpers\Helper::currencyFormat($total) }}</span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <input type="submit" formaction="/update-cart" title="" id="update-cart" value="Cập nhật giỏ hàng"/>
                                        @csrf
                                        <a href="/checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào biểu tượng <span><i class="fa fa-trash-o"></i></span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="/" title="" id="buy-more">Mua tiếp</a><br />
                <a href="/carts/delete-all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
    </form>
</div>
@include('footer')