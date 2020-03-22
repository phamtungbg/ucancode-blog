@extends('backend.master.master')
@section('title','Thêm tin tức')
@section('blog','active')
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm tin tức</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm tin tức</div>
                    <div class="panel-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category" class="form-control">
                                        {{getCate($categories,0,'',0)}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="title" class="form-control">
                                    {{showErrors($errors,'title')}}
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" name="the_tag" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="editor" name="describe" style="width: 100%;height: 100px;"></textarea>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ảnh tin tức</label>
                                    <input id="img" type="file" name="img" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="100%" height="325px"
                                        src="upload/import-img.png">
                                        {{showErrors($errors,'img')}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="editor1" class="editor1" name="content" style="width: 100%;height: 500px;"></textarea>
                                <script> CKEDITOR.replace('editor1',{
                                    filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                                    filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                                    filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                                    filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                    filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                    filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                                });
                                    </script>
                                    {{showErrors($errors,'comtent')}}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success" name="add-product" type="submit">Thêm tin tức</button>
                                <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                            </div>
                        </div>
                    </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>
<!--end main-->
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
