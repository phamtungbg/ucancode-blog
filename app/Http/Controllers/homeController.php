<?php

namespace App\Http\Controllers;

use App\models\blog;
use App\models\category;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function getIndex(){
        $data['blog']=blog::paginate(3);
        $data['pplPost'] = blog::orderBy('created_at','desc')->take(3)->get();
        $data['categories']= category::all();
        return view('index',$data);
    }

    function getCate($slugCate){
        $arr = explode('-',$slugCate);
        $id = array_pop($arr);
        $data['blog']=blog::where('cate_id',$id)->paginate(3);
        $data['pplPost'] = blog::orderBy('created_at','desc')->take(3)->get();
        $data['categories']= category::all();
        return view('index',$data);
    }
}
