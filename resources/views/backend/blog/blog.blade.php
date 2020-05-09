@extends('backend.master.master')

@section('title','Danh sách tin tức')

@section('blog','active')

@section('content')

    <!--main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row">

            <ol class="breadcrumb">

                <li><a href="#"><svg class="glyph stroked home">

                            <use xlink:href="#stroked-home"></use>

                        </svg></a></li>

                <li class="active">Danh sách tin tức</li>

            </ol>

        </div>

        <!--/.row-->



        <div class="row">

            <div class="col-lg-12">

                <h1 class="page-header">Danh sách tin tức</h1>

            </div>

        </div>

        <!--/.row-->



        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-12">



                <div class="panel panel-primary">



                    <div class="panel-body">

                        <div class="bootstrap-table">

                            <div class="table-responsive">

                                <a href="/admin/blog/add" class="btn btn-primary">Thêm tin tức</a>

                                @if (session('thongBao'))

                                <div class="alert bg-success" role="alert">

                                    <svg class="glyph stroked checkmark">

                                        <use xlink:href="#stroked-checkmark"></use>

                                    </svg>{{session('thongBao')}}<a href="#" class="pull-right"><span

                                            class="glyphicon glyphicon-remove"></span></a>

                                </div>

                                @endif



                                <table class="table table-bordered" style="margin-top:20px;">



                                    <thead>

                                        <tr class="bg-primary">

                                            <th>ID</th>

                                            <th>Thông tin tin tức</th>

                                            <th>Danh mục</th>

                                            <th>Người đăng</th>

                                            <th>Ngày đăng</th>

                                            <th width='18%'>Tùy chọn</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach ($blog as $item)

                                        <tr>

                                            <td>{{$item->id}}</td>

                                            <td>

                                                <div class="row">

                                                    <div class="col-md-3"><img  @if ($item->img) src="/{{$item->img}}" @else src="/upload/no-img.jpg" @endif alt="Hình ảnh"

                                                            width="100px" class="thumbnail"></div>

                                                    <div class="col-md-9">

                                                        <p> <strong>{{$item->title}}</strong> </p>

                                                        <p>{!!$item->describe!!}</p>

                                                    </div>

                                                </div>

                                            </td>

                                            <td>{{$item->category->name}}</td>

                                            <td>{{$item->user->name}}</td>

                                            <td>{{$item->created_at->format('M-d-Y')}}</td>

                                            <td>

                                                <a href="/admin/blog/edit/{{$item->id}}" class="btn btn-warning"><i class="fa fa-pencil"

                                                        aria-hidden="true"></i> Sửa</a>

                                                <a onclick="return del('{{$item->title}}')" href="/admin/blog/del/{{$item->id}}" class="btn btn-danger"><i class="fa fa-trash"

                                                        aria-hidden="true"></i> Xóa</a>

                                            </td>

                                        </tr>

                                        @endforeach





                                    </tbody>

                                </table>

                                <div align='right'>

                                    <ul class="pagination">

                                       {{$blog->links()}}

                                    </ul>

                                </div>

                            </div>

                            <div class="clearfix"></div>

                        </div>



                    </div>

                </div>

                <!--/.row-->





            </div>

        </div>

    </div>

    <!--end main-->



@endsection

@section('script')

    @parent

    <script>

        function del(title){

            return confirm('Bạn muốn xóa bài viết '+ title + ' này ?')

        }

    </script>

@endsection

