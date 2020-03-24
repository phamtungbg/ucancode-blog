<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
                   <ul class="nav menu">
        <li class=@yield('admin')><a href="/admin"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Tổng quan</a></li>
        <li class=@yield('category')><a href="/admin/category"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper" /></svg> Danh Mục</a></li>
        <li class=@yield('blog')><a href="/admin/blog"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg> Tin tức</a></li>
        {{-- <li class=@yield('product')><a href="/admin/product"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Sản phẩm</a></li> --}}
        <li class=@yield('slide')><a href="/admin/slide"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad" /></svg> Slide</a></li>
        <li role="presentation" class="divider"></li>
        <li class=@yield('user')><a href="/admin/user"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Quản lý thành viên</a></li>

    </ul>

</div>
