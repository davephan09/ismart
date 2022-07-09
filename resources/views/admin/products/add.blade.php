@include('admin.header')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tên sản phẩm</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="title">
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code" value="{{ old('code') }}" id="product-code">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" value="{{ old('price') }}" id="price">
                        <label for="price">Giá khuyến mãi</label>
                        <input type="text" name="price_sale" value="{{ old('price_sale') }}" id="price">
                        <label for="title">Mô tả</label>
                        <textarea name="description" id="desc" class="ckeditor">{{ old('description') }}</textarea>
                        <label for="desc">Chi tiết</label>
                        <textarea name="content" id="desc" class="ckeditor">{{ old('content') }}</textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <!-- <div id="add-file" class="add-file">Thêm File</div> -->
                            <div id="files">
                                
                                <input type='file' id="multiFiles" name='files[]' multiple>
                                
                            </div>
                        </div>
                        <label>Danh mục cha</label>
                        <select name="cat_id">
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