@include('header')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="/" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    @foreach ($posts as $post)
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="/blog/{{$post->id}}-{{ \Str::slug($post->name)}}.html" title="" class="thumb fl-left">
                                <img src="{{ $post->thumb }}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="/blog/{{ \Str::slug($post->post_cat->name) }}/{{ $post->post_cat->id }}.html">{{ $post->post_cat->name }}</a>
                                <a href="/blog/{{$post->id}}-{{ \Str::slug($post->name)}}.html" title="" class="title">{{ $post->name }}</a>
                                <span class="create-date">{{ date('d-m-Y', strtotime($post->updated_at)) }}</span>
                                <!-- <p class="desc">{{ $post->summary }}</p> -->
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            @include('product_hot')
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')