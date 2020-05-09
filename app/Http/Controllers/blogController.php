<?php



namespace App\Http\Controllers;



use App\models\blog;

use App\models\category;

use App\models\footer;

use App\models\socialIcon;

use Illuminate\Http\Request;



class blogController extends Controller

{

    function getBlog($blogSlug){

        $parentArr = [];

        $cate = category::where('parent','<>',0)->get();

        foreach ($cate as $item) {

            array_push($parentArr,$item['parent']);

        }

        $data['parentArr'] = $parentArr;

        $arr = explode('-',$blogSlug);

        $id = array_pop($arr);

        $data['blog'] = blog::find($id);

        $data['pplPost'] = blog::where('img','<>','')->orderBy('created_at','desc')->take(3)->get();

        $data['categories']= category::where('parent','<>',0)->get();

        $data['category']= category::where('parent',0)->take(8)->get();

        $data['footer'] = footer::find(1);

        $data['icon'] = socialIcon::all();

        return view('blog.single-blog',$data);

    }

}

