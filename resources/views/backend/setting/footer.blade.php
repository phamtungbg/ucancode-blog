<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Footer - Setting</title>
    <base href="/backend/">
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/styles.css" rel="stylesheet">
    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>
    <link rel="stylesheet" href="Awesome/css/all.css">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <link rel="stylesheet" href="/css/style.css">


</head>

<body>
    <!-- header -->
    @include('backend.master.header')

    <footer>
        <div class="header container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="post-feature">
                        <h3>POPULAR POSTS</h3>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="category">
                        <h3>CATEGORIES</h3>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div id="about-footer">
                        <h2 class="text-white">{{$content->title_footer}}</h2>
                        <textarea id="describe-h2" class="text-white"
                            style="font-size:58px;width: 100%;height: 100px;border: 0;box-shadow: none;background-color: #333435;color: white;">{{$content->title_footer}}</textarea>
                        <p id="describe-p" class="text-justify">{!!$content->describe_footer!!}</p>
                        <textarea id="describe-text" class="text-justify"
                            style="width: 100%;height: 200px;border: 0;box-shadow: none;background-color: #333435;color: white;">{!!$content->describe_footer!!}</textarea>
                    </div>
                    <nav id="menu-social" class="social-icons">
                        <ul id="menu-social-items" class="social-menu">
                            @foreach ($icon as $item)
                            <li><a onclick="return false" name="{{$item->id}}" class="edit-icon"
                                    href="{{$item->icon_link}}">{!!$item->icon!!}</a></li>
                            @endforeach
                            <li><a onclick="return false" class="add-icon" href="/"><i
                                        class="fas fa-plus-square add-icon"></i><span>add</span></a></li>
                        </ul>
                    </nav>

                    <div class="form-row" id="form-row">
                        <div class="col">
                            <p class="frm">Vào trang web <a class="frm" href="https://fontawesome.com/icons?d=gallery">FontAwesome</a> để có thể
                                lấy mã nhúng icon</p>
                            <input id="icon" type="text" class="form-control frm"
                                placeholder='Mã icon- VD:<i class="fab fa-facebook-f"></i>' value="">
                        </div>
                        <div class="col">
                            <input id="icon-link" type="text" class="form-control frm"
                                placeholder="Link- VD: https://www.facebook.com/" value="">
                        </div>
                        <div class="col">
                            <input type="hidden" id="icon-id" value="">
                            <button id="icon-sbm" class="btn btn-success frm" type="submit">Xác nhận</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="bottom">
            <span>Copyright ©2020 Bản quyền thuộc Eduvie.vn</span>
        </div>
    </footer>
    <div class="row">
        <div class="col-md-3 col-md-offset-9">
            <button id="sbm" class="btn btn-success" type="submit">Xác nhận</button>
        </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>


    <script>
        $(document).ready(function () {
            $(".form-row").hide();
            $("#describe-text").hide();
            $("#describe-h2").hide();
            $("body").click(function (e) {
                var target = $(e.target);
                if (target.is("#describe-p")) {
                    if ($("h2").hide()) {
                        $("h2").html($("#describe-h2").val())
                        $("#describe-h2").hide();
                        $("h2").show();
                    }
                    if ($(".form-row").show()) {
                        $(".form-row").hide()
                    }
                    $("#describe-text").val($("#describe-p").html());
                    $("#describe-p").hide();
                    $("#describe-text").show();
                } else if (target.is("#describe-text")) {
                    console.log('abc');
                } else if (target.is("#describe-h2")) {
                    console.log('abc');
                } else if (target.is(".form-control")) {
                    console.log('abc');
                } else if (target.is(".add-icon")) {
                    if ($("#describe-p").hide()) {
                        $("#describe-p").html($("#describe-text").val())
                        $("#describe-p").show();
                        $("#describe-text").hide();
                    }
                    if ($("h2").hide()) {
                        $("h2").html($("#describe-h2").val())
                        $("#describe-h2").hide();
                        $("h2").show();
                    }
                    $(".form-row").toggle();
                } else if (target.is("h2")) {
                    if ($("#describe-p").hide()) {
                        $("#describe-p").html($("#describe-text").val())
                        $("#describe-p").show();
                        $("#describe-text").hide();
                    }

                    if ($(".form-row").show()) {
                        $(".form-row").hide()
                    }
                    $("#describe-h2").val($("h2").html())
                    $("#describe-h2").show();
                    $("h2").hide();
                } else if (target.is(".edit-icon")) {
                    if ($("#describe-p").hide()) {
                        $("#describe-p").html($("#describe-text").val())
                        $("#describe-p").show();
                        $("#describe-text").hide();
                    }
                    if ($("h2").hide()) {
                        $("h2").html($("#describe-h2").val())
                        $("#describe-h2").hide();
                        $("h2").show();
                    }
                    var id = target.attr("name");
                    $.post(
                        "/admin/footer/edit-icon", {
                            "_token": "{{ csrf_token() }}",
                            id: id
                        },
                        function (data) {
                            // console.log(data.icon);
                            $("#icon-id").val(data.id);
                            $("#icon").val(data.icon);
                            $("#icon-link").val(data.icon_link);
                        }
                    )
                    $(".form-row").toggle();
                } else {
                    if ($("#describe-p").hide()) {
                        $("#describe-p").html($("#describe-text").val())
                        $("#describe-p").show();
                        $("#describe-text").hide();
                    }
                    if ($("h2").hide()) {
                        $("h2").html($("#describe-h2").val())
                        $("#describe-h2").hide();
                        $("h2").show();
                    }
                    if ($(".form-row").show()) {
                        $(".form-row").hide();
                    }
                }
            });
        })

        $("#icon-sbm").click(function (e) {
            e.preventDefault()
            var id = $("#icon-id").val(),
                icon = $("#icon").val(),
                icon_link = $("#icon-link").val();

            $.post(
                "/admin/footer/post-icon", {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    icon: icon,
                    icon_link: icon_link
                },
                function (data) {
                    if (data == 'success') {
                        console.log(data);

                        location.reload();
                    }
                }
            )

        })

        $("#sbm").click(function (e) {
            e.preventDefault()
            var title_footer = $("h2").html(),
                describe_footer = $("#describe-p").html();
            // console.log(title_footer);

            $.post(
                "/admin/footer", {
                    "_token": "{{ csrf_token() }}",
                    title_footer: title_footer,
                    describe_footer: describe_footer
                },
                function (data) {
                    if (data == 'success') {
                        console.log(data);
                        location.reload();
                    }
                }
            )

        })

    </script>

</body>

</html>
