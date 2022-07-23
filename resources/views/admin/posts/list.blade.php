@include('admin.header')

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        @include('admin.sidebar')
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="/admin/posts/add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=posts">Tất cả <span class="count">({{ count($posts) }})</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">({{ count($posts->where('active', 1)) }})</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">({{ count($posts->where('active', 0)) }})</span></a></li>
                        </ul>
                        <form method="GET" action="search" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <button>Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thùng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Kích hoạt</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $t = 0;
                                @endphp
                                @foreach ($posts as $key => $post)
                                @php
                                $t++;
                                @endphp
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">{{ $t }}</h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="{{ $post->thumb }}" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{ $post->name }}</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="/admin/posts/edit/{{$post->id}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="#" onclick="removeRow('{{$post->id}}', '/admin/posts/destroy')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">{{ $post->post_cat->name }}</span></td>
                                    <td><span class="tbody-text">{!! \App\Helpers\Helper::active($post->active) !!}</span></td>
                                    <td><span class="tbody-text">{{ $post->updated_at }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')