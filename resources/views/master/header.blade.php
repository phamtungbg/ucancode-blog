<header>
    <div class="container">
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
            <a class="navbar-brand" href="/">Eduvie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    @foreach ($category as $item)
                            @if (in_array($item->id,$parentArr))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-{{$item->id}}" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">{{$item->name}} </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-info"
                                    aria-labelledby="navbarDropdownMenuLink-{{$item->id}}">
                                    @foreach ($categories as $row)
                                        @if ($row->parent==$item->id)
                                        <a class="dropdown-item" href="/{{$row->slug}}-{{$row->id}}.html"> {{$row->name}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="/{{$item->slug}}-{{$item->id}}.html">
                                    {{-- <i class="fas fa-home"></i> --}}
                                     {{$item->name}}
                                </a>
                            </li>
                            @endif
                    @endforeach
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Profile </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info"
                            aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item" href="#">My account</a>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
