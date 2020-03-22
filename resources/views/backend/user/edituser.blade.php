@extends('backend.master.master')
@section('title','Sửa thành viên')
@section('user','active')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên</div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row justify-content-center" style="margin-bottom:40px">

                        <div class="col-md-6 col-lg-6 col-lg-offset-1">

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}">
                                {{showErrors($errors,'email')}}
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="text" name="password" class="form-control" value="">
                                {{showErrors($errors,'password')}}
                            </div>
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="full" name="full_name" class="form-control" value="{{$user->full_name}}">
                                {{showErrors($errors,'full_name')}}
                            </div>
                            <div class="form-group">
                                <label>Thông tin</label>
                                <textarea name="info" style="width: 100%;height: 100px;">{!!$user->info!!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input id="img" type="file" name="avatar" class="form-control hidden"
                                    onchange="changeImg(this)">
                                <img id="avatar" class="thumbnail" width="100%" height="325px"
                                    src="/{{$user->avatar}}">
                                    {{showErrors($errors,'avatar')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-lg-offset-3 text-right">

                                <button class="btn btn-success" type="submit">Sửa thành viên</button>
                                <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                            </div>
                        </div>


                    </div>

                    <div class="clearfix"></div>
                </form>
                </div>
            </div>

        </div>
    </div>

    <!--/.row-->
</div>
@endsection

@section('script')
    @parent
    <script>
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
    </script>
@endsection
