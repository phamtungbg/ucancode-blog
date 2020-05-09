@extends('master.master')
@section('title')
@if($cate) {{$cate->name}} @else {{'Trang chủ'}} @endif
@stop
@section('meta')
    <meta property="og:image" content="{{'http://phucnguyenthe0809.tk/'.'upload/slide-1.jpeg'}}" />
    <meta property="og:image:width" content="720" />
    <meta property="og:image:height" content="480" />
    <meta name="description" content="@if($cate) {{$cate->describe}} @else {{'Trang tin tức hàng đầu cập nhật tất cả tin tức Đời sống, Thể thao, Pháp luật ....'}} @endif" />
    <meta name="keywords" content="@if($cate) {{$cate->name}} @else {{'Trang chủ'}} @endif" />
@stop
@section('content')
<div id="slide">
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($slide as $key=>$value)
                @if ($key==0)
                  <li data-target="#carousel-example-2" data-slide-to="{{$key}}" class="active"></li>
                @else
                <li data-target="#carousel-example-2" data-slide-to="{{$key}}"></li>
                @endif
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($slide as $key=>$value)

            <div class="carousel-item @if ($key==0) active @endif">
                <div class="view">
                    <img class="d-block w-100" src="/{{$value->slide}}"
                        alt="">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive">{{$value->mask}}</h3>
                    <p>{{$value->text}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
               @if ($blog[0]!='')
                    @foreach ($blog as $item)
                    <article id="post">		      <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html">
                        @if ($item->img)
                        <img src="/{{$item->img}}"
                        alt="{{$item->title}}">
                        @endif	</a>
                        <div class="post-content post-inner-content">
                                <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html"> <h2>  {{$item->title}}</h2></a>
                            <div class="info"> <span> {{$item->created_at->format('M-d-Y')}} {{$item->user->full_name}} </span></div>
                            <p class="text-justify">
                                {!!$item->describe!!}
                            </p>
                            <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html" class="btn btn-danger float-right">Xem thêm</a>
                        </div>
                    </article>
                    @endforeach
                    <div id="paginate" align="center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{$blog->links()}}
                            </ul>
                        </nav>
                    </div>
               @else
                <div class="text-justify" style="padding-top: 100px">
                    <h3>
                        Hiện không có bài viết nào hoặc đang được cập nhật !
                    </h3>
                </div>
               @endif
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <aside>
                    <div class="post-feature">
                        <h3>POPULAR POSTS</h3>
                        @foreach ($pplPost as $item)
                        <div class="post">
                            <div class="post-image ">

                                <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html">
                                    <img width="60" height="60"
                                    @if ($item->img) src="/{{$item->img}}"  @endif>
                                </a>
                            </div>
                            <div class="post-content">
                                <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html">{{$item->title}}</a>
                                <span class="date">{{$item->created_at->format('M-d-Y')}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="category">
                        <h3>CATEGORIES</h3>
                        <ul>
                            @foreach ($categories as $item)
                            <li class="cat-item cat-item-38"><a
                                href="/{{$item->slug}}-{{$item->id}}.html"
                                title="{{$item->name}}">{{$item->name}}</a>
                            <span>{{$item->blog->count()}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- <div id="tag_cloud-2" class="widget widget_tag_cloud">
                        <h3 class="widget-title">Tags</h3>
                        <div class="tagcloud" style=""><a href="https://colorlib.com/sparkling/tag/8bit/"
                                class="tag-cloud-link tag-link-66 tag-link-position-1" style="font-size: 8pt;"
                                aria-label="8BIT (1 item)">8BIT</a>
                            <a href="https://colorlib.com/sparkling/tag/alignment-2/"
                                class="tag-cloud-link tag-link-67 tag-link-position-2"
                                style="font-size: 12.516129032258pt;" aria-label="alignment (3 items)">alignment</a>
                            <a href="https://colorlib.com/sparkling/tag/articles/"
                                class="tag-cloud-link tag-link-68 tag-link-position-3" style="font-size: 8pt;"
                                aria-label="Articles (1 item)">Articles</a>
                            <a href="https://colorlib.com/sparkling/tag/aside/"
                                class="tag-cloud-link tag-link-69 tag-link-position-4" style="font-size: 8pt;"
                                aria-label="aside (1 item)">aside</a>
                            <a href="https://colorlib.com/sparkling/tag/audio/"
                                class="tag-cloud-link tag-link-70 tag-link-position-5" style="font-size: 8pt;"
                                aria-label="audio (1 item)">audio</a>
                        </div>
                    </div> --}}
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
@parent
@endsection
