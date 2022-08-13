<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($title) ? $title : 'Quản lý ISMART' }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/template/admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/admin/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/admin/reset.css" rel="stylesheet" type="text/css" />
    <link href="/template/admin/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/admin/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/template/admin/css/main.css" type="text/css" />
    <link href="/template/admin/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="/template/admin/images/admin.png"/>

    <script src="/template/admin/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="/template/admin/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="/template/admin/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/template/admin/js/main.js" type="text/javascript"></script>
    <script src="/template/admin/js/mainaj.js" type="text/javascript"></script>
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <a href="/admin/main" title="" id="logo" class="fl-left">ADMIN</a>
                    <ul id="main-menu" class="fl-left">
                        <li>
                            <a href="/admin/pages/list" title="">Trang</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/pages/add" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="/admin/pages/list" title="">Danh sách trang</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/posts/list" title="">Bài viết</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/posts/add" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="/admin/posts/list" title="">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="/admin/post_cat/list" title="">Danh mục bài viết</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/products/list" title="">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/products/add" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="/admin/products/list" title="">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="/admin/product_cat/list" title="">Danh mục sản phẩm</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/carts/list" title="">Bán hàng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/carts/list" title="">Danh sách đơn hàng</a>
                                </li>
                                <li>
                                    <a href="/admin/carts/customers" title="">Danh sách khách hàng</a> 
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/sliders/list" title="">Slider</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/sliders/add" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="/admin/sliders/list" title="">Danh sách slide</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle" class="fl-left">
                                <img src="/template/admin/images/img-admin.png">
                            </div>
                            <h3 id="account" class="fl-right">{{-- $_SESSION['user_login'] --}}</h3>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="?mod=users&action=update" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                            <li><a href="/admin/users/logout" title="Thoát">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </div>