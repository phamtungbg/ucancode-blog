@extends('master.master')
@section('title','Trang chủ')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <article id="post">
                        <img src="/{{$blog->img}}"
                            alt="{{$blog->title}}">
                        <div class="post-content post-inner-content">
                            <h1>{{$blog->title}}</h1>
                            <div class="info"> <span> {{$blog->created_at->format('M-d-Y')}} {{$blog->user->full_name}} </span></div>
                            <p>
                                {!!$blog->content!!}
                            </p>
                        </div>
                        <div id="user-info" class="post-inner-content">
                            <img src="/{{$blog->user->avatar}}" alt="">
                            <div>
                                <p class="username">{{$blog->user->full_name}}</p>
                                <p >
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
                                        <img width="60" height="60"
                                            src="/{{$item->img}}">
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
                        <div id="tag_cloud-2" class="widget widget_tag_cloud">
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
                    </aside>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@parent
@endsection
