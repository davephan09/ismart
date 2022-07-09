@include('admin.header')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST">
                        {{ csrf_field() }}
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title">
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="title">Mô tả</label>
                        <textarea name="description" id="desc" class="ckeditor"></textarea>
                        <label>Danh mục cha</label>
                        <select name="parent_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($productCat as $item)
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