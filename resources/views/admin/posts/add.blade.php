@include('admin.header')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="name" id="title">
                        <label for="summary">Mô tả ngắn</label>
                        <input type="text" name="summary" id="title">
                        <label for="desc">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <div id="image-show">

                            </div>
                            <input type="hidden" name="thumb" id="thumb">
                        </div>
                        <label>Danh mục</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($postCat as $key => $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="title">Kích hoạt</label>
                        <div>
                            <input type="radio" id="active" name="active" value="1">Có
                        </div>
                        <div class="radio-check">
                            <input type="radio" id="no_active" value="0" name="active">Không
                        </div>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')