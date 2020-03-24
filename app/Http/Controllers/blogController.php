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
        $data['pplPost'] = blog::where('img','<>','')->orderBy('created_at','desc')->take(3)->get();
        $data['categories']= category::where('parent','<>',0)->get();
        $data['category']= category::where('parent',0)->take(8)->get();
        return view('blog.single-blog',$data);
    }
}
