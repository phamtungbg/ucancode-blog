<?php



namespace App\Http\Controllers\backend;



use App\Http\Controllers\Controller;

use App\Http\Requests\addBlogRequest;

use App\Http\Requests\editBlogRequest;

use App\models\blog;

use App\models\category;

use Illuminate\Support\Str;

use Auth;

use Illuminate\Http\Request;



class blogController extends Controller

{

    function getBlog(){

        $data['blog'] = blog::paginate(10);

        return view('backend.blog.blog',$data);

    }

    function getAddBlog(){

        $data['categories'] = category::all();

        return view('backend.blog.addblog',$data);

    }

    function postAddBlog(addBlogRequest $r){

        // dd($r->all());

        $blog = new blog;

        $blog->title=$r->title;

        $blog->describe=$r->describe;

        $blog->content=$r->content;

        $tagArr = explode(',',$r->the_tag);

        $blog->the_tag = json_encode( $tagArr);

        $blog->slug_title=Str::slug($r->title, '-');

        $blog->cate_id=$r->category;

        $blog->user_id=Auth::user()->id;

        $blog->save();

        if ($r->hasFile('img')) {

            $file = $r->img;

            $fileName=$blog->slug_title.'-'.$blog->id.'.'.$file->extension();

            $path = $file->storeAs('upload',$fileName,'upload');

            $blog->img =  $path;

        }

        $blog->save();

        return redirect('/admin/blog')->with('thongBao','Đã thêm thành công');

    }



    function getEditBlog($blogId){

        $data['blog'] = blog::find($blogId);

        $data['categories'] = category::all();

        return view('backend.blog.editblog',$data);

    }

    function postEditBlog(request $r,$blogId){

        $blog = blog::find($blogId);

        $blog->describe=$r->describe;

        $blog->content=$r->content;

        $blog->slug_title=Str::slug($r->title, '-');

        $tagArr = explode(',',$r->the_tag);

        $blog->the_tag = json_encode( $tagArr);

        $blog->cate_id=$r->category;

        $blog->user_id=Auth::user()->id;

        if ($r->hasFile('img')) {

            if ($blog->img) {

                unlink($blog->img);

            }

            $file = $r->img;

            $fileName=Str::slug($r->title, '-').'-'.$blogId.'.'.$file->extension();

            $path = $file->storeAs('upload',$fileName,'upload');

            $blog->img =  $path;

        }else{

            if($r->title!= $blog->title){

                if ($r->img) {

                    $file = $blog->img ;

                    $extFile =pathinfo($file)['extension'];

                    $fileName = Str::slug($r->title, '-').'-'.$blogId.'.'.$extFile;

                    rename(public_path($file),public_path('upload/'. $fileName));

                    $blog->img = 'upload/'.$fileName;

                }

            }

        }

        $blog->title=$r->title;

        $blog->save();

        return redirect('/admin/blog')->with('thongBao','Đã sửa thành công');

    }



    function delBlog($blogId){

        $blog = blog::find($blogId);

        if ($blog->img) {

            unlink($blog->img);

        }

        $blog->delete();

        return redirect('/admin/blog')->with('thongBao','Đã xóa thành công');

    }

}

