@extends('backend.master.master')

@section('title','Slide setting')

@section('slide','active')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <form action="/admin/slide/upload" method="post" enctype="multipart/form-data">

        {{-- @csrf --}}

        <div class="row">
            @if (!empty($slide->toarray()))
                @foreach ($slide as $key=>$value)

                <div class="col-md-4">

                    <div class="form-group">

                        <label>Ảnh {{$key+1}}</label>

                        <input id="img{{$key+1}}" type="file" name="img{{$key+1}}" class="form-control hidden"

                            onchange="changeImg(this , {{$key+1}})">

                        <img id="avatar{{$key+1}}" class="thumbnail" width="100%" height="325px"

                            @if ($value->slide) src="/{{$value->slide}}" @else src="/upload/import-img.png" @endif>

                    </div>

                </div>

                @endforeach

            @else
            <div class="text-justify" style="padding: 100px 100px">
                <h3>
                    Hiện không có slide nào !
                </h3>
            </div>

            @endif

        <input type="hidden" id="lastId" name="lastId" value="{{$lastId}}">


            {{-- {{dd($lastId)}} --}}
        </div>

        <div class="row">

            <div class="col-md-3">

                <button id="add" class="btn btn-success" type="submit">Thêm Slide</button>

                <button id="del" class="btn btn-danger" type="submit">Xóa bớt Slide</button>

            </div>

            <div class="col-md-2 col-md-offset-7">

                <button id="sbm" class="btn btn-success" type="submit">Áp dụng</button>

            </div>

        </div>

    </form>

</div>

@endsection

@section('script')

    @parent

    <script>

        var lastId = $('#lastId').val();

        function changeImg(input,location) {

            console.log(input.files);

            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                //Sự kiện file đã được load vào website

                reader.onload = function (e) {

                    //Thay đổi đường dẫn ảnh

                    $('#avatar'+location).attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);

            }

        }

        $(document).ready(function () {



            for (let i = 1; i <= lastId; i++) {

                $('#avatar'+i).click(function () {

                $('#img'+i).click();

            });

            }

        });

    </script>

    <script>

        $("#sbm").click(function (e) {

            e.preventDefault()

            var file = [];

            for (let i = 1; i <= lastId; i++) {

                let img = $("#avatar"+i).attr('src')

                if (img.split(".", 1)[0] == "/upload/import-img" || img.split(".", 1)[0] == "/upload/slide-"+i)

                {

                    file.push("");

                }else{

                    file.push(img);

                }

        };

        console.log(file);

        $.post(

            "/admin/slide/upload",

            {file:file, _token:"{{ csrf_token() }}"},

            function(data){

                console.log(data);

                alert('Upload thành công');

            }

        )

        });



        $("#add").click(function(e) {

            e.preventDefault()

            $.post(

                "/admin/slide/add",

                {_token:"{{ csrf_token() }}",lastId:lastId},

                function(data) {

                    if (data=='add success') {

                        alert('Đã thêm thành công');

                        location.reload();

                    }

                }

            )

        });



        $("#del").click(function(e) {

            e.preventDefault()

            if (lastId==0) {
                return alert('Hiện không còn slide để xóa');
            }

            $.post(

                "/admin/slide/del",

                {_token:"{{ csrf_token() }}",lastId:lastId},

                function(data) {

                    if (data=='del success') {

                        alert('Đã xóa thành công');

                        location.reload();

                    }

                }

            )

        })



    </script>

@endsection

