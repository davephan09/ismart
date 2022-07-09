@include('admin.header')
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tên slider</label>
                        <input type="text" name="name" value="{{ $slider->name }}" id="title">
                        <label for="title">Link</label>
                        <input type="text" name="url" value="{{ $slider->url }}" id="slug">
                        <label for="title">Thứ tự</label>
                        <input type="number" name="sort_by" value="{{ $slider->sort_by }}" id="num-order">
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <div id="image-show">
                                <a href="{{ $slider->thumb }}" target="_blank">
                                    <img src="{{ $slider->thumb }}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="{{ $slider->thumb }}" id="thumb">
                        </div>
                        <label>Trạng thái</label>
                        <select name="active">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1" {{ $slider->active == 1 ? 'selected' : '' }}>Công khai</option>
                            <option value="2" {{ $slider->active == 0 ? 'selected' : '' }}>Chờ duyệt</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')