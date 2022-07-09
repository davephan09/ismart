@include('admin.header')
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.sidebar-users')
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST">
                        @csrf
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="fullname" value="{{ $user->fullname }}" id="display-name">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" value="{{ $user->username }}" placeholder="{{ $user->username }}" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" id="email">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" value="{{ $user->phone }}" id="tel">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address">{{ $user->address }}</textarea>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')