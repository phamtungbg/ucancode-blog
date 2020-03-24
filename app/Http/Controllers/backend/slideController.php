<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\models\slide;
use Illuminate\Http\Request;

class slideController extends Controller
{
    function getSlide(){
        $data['slide'] = slide::all();
        $data['lastId'] = slide::all()->count();
        return view ('backend.slide.slide',$data);
    }

    function uploadSlide(request $r){

        foreach ($r->file as $key=>$value) {
            $id = $key+1;
            if ($value) {
                list($extension, $image ) = explode(';', $value );
                list(, $image ) = explode(',', $image);
                $image = base64_decode($image);
                list(,$extension) = explode('/', $extension);
                $fileName = 'slide-'.$id.'.'.$extension;
                if ($slide = slide::find($id)) {
                    if ($slide->slide) {
                        unlink($slide->slide);
                    }
                    $slide->slide = 'upload/'.$fileName;
                    $slide->save();

                }else{
                    $slide = new slide;
                    $slide->id = $id;
                    $slide->slide = 'upload/'.$fileName;
                    $slide->save();
                }
                file_put_contents('upload/'.$fileName,$image);
                $id='';
            }
        }
        return 'success';
    }

    function addSlide(request $r){
        $slide = new slide;
        $slide->id = $r->lastId+1;
        $slide->save();
        return 'add success';
    }

    function delSlide(request $r){
        $slide = slide::find($r->lastId);
        if ($slide->slide) {
            unlink($slide->slide);
        }
        $slide->delete();
        return 'del success';
    }
}
