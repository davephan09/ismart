@include('admin.header')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="name" value="{{ $post->name }}" id="title">
                        <label for="summary">Mô tả ngắn</label>
                        <input type="text" name="summary" value="{{ $post->summary }}" id="title">
                        <label for="desc">Nội dung</label>
                        <textarea name="content" id="desc" class="ckeditor">{{ $post->content }}</textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <div id="image-show">
                                <a href="{{ $post->thumb }}" target="_blank">
                                    <img src="{{ $post->thumb }}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="{{ $post->thumb }}"id="thumb">
                        </div>
                        <label>Danh mục</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($postCat as $key => $item)
                            <option value="{{ $item->id }}" {{ $item->id == $post->cat_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="title">Kích hoạt</label>
                        <div>
                            <input type="radio" id="active" name="active" value="1" {{ $post->active == 1 ? 'checked=""' : '' }}>Có
                        </div>
                        <div class="radio-check">
                            <input type="radio" id="no_active" value="0" {{ $post->active == 0 ? 'checked=""' : '' }} name="active">Không
                        </div>
                        <button type="submit" name="btn-add" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')