@extends('master.master')
@section('title')
{{$blog->title}}
@stop
@section('meta')
<meta name="description" content="$blog->describe">
<meta name="keywords" content=" @if ($blog->the_tag)@foreach (json_decode($blog->the_tag) as $item){{$item}},@endforeach @endif" />
@if ($blog->img)
<meta property="og:image" content="{{asset($blog->img)}}" />
<meta property="og:image:width" content="720" />
<meta property="og:image:height" content="480" />
@endif
@stop
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <article id="post">
                    @if ($blog->img)
                    <img src="/{{$blog->img}}" alt="{{$blog->title}}">
                    @endif

                    <div class="post-content post-inner-content">
                        <h1>{{$blog->title}}</h1>
                        <div class="info"> <span> {{$blog->created_at->format('M-d-Y')}} {{$blog->user->full_name}}
                            </span></div>
                        <p>
                            {!!$blog->content!!}
                        </p>
                    </div>
                    <div id="user-info" class="post-inner-content">
                        <img src="/{{$blog->user->avatar}}" alt="">
                        <div>
                            <p class="username">{{$blog->user->full_name}}</p>
                            <p>
                                {!!$blog->user->info!!}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <aside>
                    <div class="post-feature">
                        <h3>POPULAR POSTS</h3>
                        @foreach ($pplPost as $item)
                        <div class="post">

                            <div class="post-image ">
                                <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html">
                                    <img width="60" height="60" @if ($item->img) src="/{{$item->img}} @endif">
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
                            <li class="cat-item cat-item-38"><a href="/{{$item->slug}}-{{$item->id}}.html"
                                    title="{{$item->name}}">{{$item->name}}</a>
                                <span>{{$item->blog->count()}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="tag_cloud-2" class="widget widget_tag_cloud">
                        <h3 class="widget-title">Tags</h3>
                        <div class="tagcloud" style="">
                            @if ($blog->the_tag)
                            @foreach (json_decode($blog->the_tag) as $item)
                            <a onclick="return false" href="/" class="tag-cloud-link tag-link-66 tag-link-position-1"
                                style="font-size: 8pt;">{{$item}}</a>
                            @endforeach
                            @endif
                        </div>
                </aside>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
@parent
@endsection
