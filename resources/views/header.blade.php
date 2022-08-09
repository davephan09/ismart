<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($title) ? $title : 'ISMART STORE'}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/template/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/reset.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="/template/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/style.css" rel="stylesheet" type="text/css" />
    <link href="/template/responsive.css" rel="stylesheet" type="text/css" />

    <script src="/template/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="/template/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
    <script src="/template/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="/template/js/carousel/owl.carousel.js" type="text/javascript"></script>
    <script src="/template/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">
                        <a href="/6-chinh-sach-thanh-toan.html" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="/" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="/danh-muc/1-smartphone.html" title="">Smartphone</a>
                                </li>
                                <li>
                                    <a href="/danh-muc/5-laptop.html" title="">Laptop</a>
                                </li>
                                <li>
                                    <a href="/danh-muc/8-tablet.html" title="">Tablet</a>
                                </li>
                                <li>
                                    <a href="/blog/" title="">Blog</a>
                                </li>
                                <li>
                                    <a href="/5-gioi-thieu-chung.html" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="/3-lien-he.html" title="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="/" title="" id="logo" class="fl-left"><img src="/template/images/logo.png" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="GET" action="/search">
                                <input type="text" name="s" value="" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                                <div class="search-ajax-result">
                                    
                                </div>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>

                            @include('cart')
                        </div>
                    </div>
                </div>
            </div>