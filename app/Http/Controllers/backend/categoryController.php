<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\addCategoryRequest;
use App\Http\Requests\editCategoryRequest;
use App\models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function getCategory(){
        $data['categories'] = category::all();
        return view('backend.category.category',$data);
    }
    function postAddCategory(addCategoryRequest $r) {
        $cate = new category;
        $cate->name = $r->name;
        $cate->slug = Str::slug($r->name, '-');
        $cate->parent = $r->category;
        $cate->save();
        return redirect()->back()->with('thongBao','Đã thêm thành công');
    }

    function getEditCategory($idCate){
        $data['cate'] = category::find($idCate);
        $data['categories'] = category::all();
        return view('backend.category.editcategory',$data);
    }

    function postEditCategory(editCategoryRequest $r,$idCate){
        $cate = category::find($idCate);
        $cate->name = $r->name;
        $cate->slug = Str::slug($r->name, '-');
        $cate->parent = $r->category;
        $cate->save();
        return redirect()->back()->with('thongBao','Đã sửa thành công');
    }

    function delCategory($idCate){
        category::find($idCate)->delete();
        return redirect('/admin/category')->with('thongBao','Đã xóa thành công');
    }

}
