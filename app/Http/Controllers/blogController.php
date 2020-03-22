<?php

namespace App\Http\Controllers;

use App\models\blog;
use App\models\category;
use Illuminate\Http\Request;

class blogController extends Controller
{
    function getBlog($blogSlug){
        $arr = explode('-',$blogSlug);
        $id = array_pop($arr);
        $data['blog'] = blog::find($id);
        $data['pplPost'] = blog::orderBy('created_at','desc')->take(3)->get();
        $data['categories']= category::all();
        return view('blog.single-blog',$data);
    }
}
