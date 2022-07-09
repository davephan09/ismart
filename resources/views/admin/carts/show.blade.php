@include('admin.header')
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chi tiết Đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="infor-customer">
                <p>Tên khách hàng : <strong>{{ $customer->name }}</strong></p>
                <p>Số điện thoại : <strong>{{ $customer->phone }}</strong></p>
                <p>Email : <strong>{{ $customer->email }}</strong></p>
                <p>Địa chỉ : <strong>{{ $customer->address }}</strong></p>
                <p>Ghi chú : <strong>{{ $customer->note }}</strong></p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">({{ count($carts) }})</span></a></li>
                        </ul>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkAll" id="checkAll"></td> -->
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên sản phẩm</span></td>
                                    <td><span class="thead-text">Giá sản phẩm</span></td>
                                    <td><span class="thead-text">Số lượng</span></td>
                                    <td><span class="thead-text">Tổng tiền</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $t = 0;
                                $sumPrice = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                @php
                                $t++;
                                $price = $cart->price * $cart->qty;
                                $sumPrice += $price;
                                @endphp
                                <tr>
                                    <!-- <td><input type="checkbox" name="checkItem" class="checkItem"></td> -->
                                    <td><span class="tbody-text">{{ $t }}</h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{ $cart->product->name }}</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">{{ \App\Helpers\Helper::currencyFormat($cart->price) }}</span></td>
                                    <td><span class="tbody-text">{{ $cart->qty }}</span></td>
                                    <td><span class="tbody-text">{{ \App\Helpers\Helper::currencyFormat($price) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <!-- <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p> -->
                    <span class="fl-right sum-price"><strong>Tổng tiền đơn hàng</strong> : {{ \App\Helpers\Helper::currencyFormat($sumPrice) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')