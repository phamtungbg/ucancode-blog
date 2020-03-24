<footer>
    <div class="header container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="post-feature">
                    <h3>POPULAR POSTS</h3>
                    @foreach ($pplPost as $item)
                    <div class="post">

                        <div class="post-image ">
                            <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html">
                                <img width="60" height="60"
                                @if ($item->img) src="/{{$item->img}}" @endif >
                            </a>
                        </div>

                        <div class="post-content">
                            <a href="/blog/{{$item->slug_title}}-{{$item->id}}.html">{{$item->title}}</a>
                            <span class="date"{{$item->created_at->format('M-d-Y')}}</span>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="category">
                    <h3>CATEGORIES</h3>
                    <ul>
                        @foreach ($category as $item)
                        <li class="cat-item cat-item-38"><a
                            href="/{{$item->slug}}-{{$item->id}}.html"
                            title="{{$item->name}}">{{$item->name}}</a>
                        <span>{{blogCount($item,$categories,0)}}</span>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div id="about-footer">
                    <h2 class="text-white">{{$footer->title_footer}}</h2>
                    <p class="text-justify">{!!$footer->describe_footer!!}</p>
                </div>
                <nav id="menu-social" class="social-icons">
                    <ul id="menu-social-items" class="social-menu">
                        @foreach ($icon as $item)
                        <li ><a href="{{$item->icon_link}}">{!!$item->icon!!}</a></li>
                        @endforeach


                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="bottom">
            <span>Copyright ©2020 Bản quyền thuộc  Eduvie.vn</span>
    </div>
</footer>
