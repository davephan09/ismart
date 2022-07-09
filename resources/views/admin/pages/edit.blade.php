@include('admin.header')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="name" value="{{ $page->name }}" id="title">
                        <label for="summary">Mô tả ngắn</label>
                        <input type="text" name="summary" value="{{ $page->summary }}" id="title">
                        <label for="desc">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor">{{ $page->content }}</textarea>
                        
                        <label for="title">Kích hoạt</label>
                        <div>
                            <input type="radio" id="active" name="active" {{ $page->active == 1 ? 'checked=""' : '' }} value="1">Có
                        </div>
                        <div class="radio-check">
                            <input type="radio" id="no_active" value="0" {{ $page->active == 0 ? 'checked=""' : '' }} name="active">Không
                        </div>
                        <button type="submit" name="btn-add" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')