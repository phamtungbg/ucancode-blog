<?php

namespace App\Http\Controllers;

use App\models\blog;
use App\models\category;
use App\models\slide;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function getIndex(){
        $data['slide']=slide::all();
        $data['blog']=blog::paginate(3);
        $data['pplPost'] = blog::where('img','<>','')->orderBy('created_at','desc')->take(3)->get();
        $data['categories']= category::where('parent','<>',0)->get();
        $data['category']= category::where('parent',0)->take(8)->get();
        return view('index',$data);
    }

    function getCate($slugCate){
        $arr = explode('-',$slugCate);
        $id = array_pop($arr);
        $cate = category::find($id);
        if ( $cate['parent'] == 0) {
            $cateChild = category::where('parent',$id)->get();
            $idChild = [];
            foreach ($cateChild as $item) {
                array_push($idChild,$item['id']);
            }
            // dd($idChild);
            $data['blog']=blog::whereIn('cate_id',$idChild)->paginate(3);
        } else {
            $data['blog']=blog::where('cate_id',$id)->paginate(3);
        }
        $data['pplPost'] = blog::where('img','<>','')->orderBy('created_at','desc')->take(3)->get();
        $data['categories']= category::where('parent','<>',0)->get();
        $data['category']= category::where('parent',0)->take(8)->get();
        return view('index',$data);
    }
}
