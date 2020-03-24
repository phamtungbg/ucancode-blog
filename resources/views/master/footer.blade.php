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
                        @foreach ($categories as $item)
                        <li class="cat-item cat-item-38"><a
                            href="/{{$item->slug}}-{{$item->id}}.html"
                            title="{{$item->name}}">{{$item->name}}</a>
                        <span>{{$item->blog->count()}}</span>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div id="about-footer">
                    <h2 class="text-white">EDUVIE</h2>
                    <p class="text-justify">
                        Awesome and completely free WordPress WooCommerce themes to take your ecommerce website to
                        the
                        next level.

                        If you are having problems with theme setup, please feel free to use Colorlib support forum.
                    </p>
                </div>
                <nav id="menu-social" class="social-icons">
                    <ul id="menu-social-items" class="social-menu">
                        <li ><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                        <li ><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                        <li ><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="bottom">
            <span>Copyright ©2020 Bản quyền thuộc  Eduvie.vn</span>
    </div>
</footer>
