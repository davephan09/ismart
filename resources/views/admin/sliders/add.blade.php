@include('admin.header')
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tên slider</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="title">
                        <label for="title">Link</label>
                        <input type="text" name="url" value="{{ old('url') }}" id="slug">
                        <label for="title">Thứ tự</label>
                        <input type="number" name="sort_by" value="1" id="num-order">
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <div id="image-show">

                            </div>
                            <input type="hidden" name="thumb" id="thumb">
                        </div>
                        <label>Trạng thái</label>
                        <select name="active">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1">Công khai</option>
                            <option value="2">Chờ duyệt</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')