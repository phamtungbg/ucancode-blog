<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\footer;
use App\models\socialIcon;
use Illuminate\Http\Request;

class footerController extends Controller
{
    function getFooter(){
        $data['content'] = footer::find(1);
        $data['icon'] = socialIcon::all();
        return view ('backend.setting.footer',$data);
    }

    function postFooter(Request $r){
        if (footer::find(1)) {
            $footer = footer::find(1);
            $footer->title_footer=$r->title_footer;
            $footer->describe_footer=$r->describe_footer;
            $footer->save();
        }else{
            $footer = new footer;
            $footer->title_footer=$r->title_footer;
            $footer->describe_footer=$r->describe_footer;
            $footer->save();
        }
        return 'success';
    }
    function editIcon(Request $r){
        $data = socialIcon::find($r->id);
        return response()->json($data, 200);
    }

    function postIcon(Request $r){
        if ($r->id) {
            $icon = socialIcon::find($r->id);
        } else {
            $icon = new socialIcon;
        }
            $icon->icon=$r->icon;
            $icon->icon_link=$r->icon_link;
            $icon->save();
            return 'success';
    }
    function delIcon(Request $r){
        socialIcon::find($r->id)->delete();
        return 'success';
    }


}
