@include('admin.header')
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    @include('admin.alert')
                    <form method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="title">Tên sản phẩm</label>
                        <input type="text" name="name" value="{{ $product->name }}" id="title">
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code"value="{{ $product->code }}" id="product-code">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" value="{{ $product->price }}" id="price">
                        <label for="price">Giá khuyến mãi</label>
                        <input type="text" name="price_sale" value="{{ $product->price_sale }}" id="price">
                        <label for="title">Mô tả</label>
                        <textarea name="description" id="desc" class="ckeditor">{{ $product->description }}</textarea>
                        <label for="desc">Chi tiết</label>
                        <textarea name="content" id="desc" class="ckeditor">{{ $product->content }}</textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <div id="image-show">
                                <a href="{{ $product->thumb }}" target="_blank">
                                    <img src="{{ $product->thumb }}" width="100px">
                                </a>
                            </div>
                            <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
                        </div>
                        <label>Danh mục cha</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($productCat as $item)
                            <option value="{{ $item->id }}" {{ $product->cat_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="title">Kích hoạt</label>
                        <div>
                            <input type="radio" id="active" name="active" {{ $product->active == 1 ? 'checked=""' : '' }} value="1">Có
                        </div>
                        <div class="radio-check">
                            <input type="radio" id="no_active" value="0" {{ $product->active == 0 ? 'checked=""' : '' }} name="active">Không
                        </div>
                        <button type="submit" name="btn-add" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')