<?php



namespace App\Http\Controllers\backend;



use App\Http\Controllers\Controller;

use App\Http\Requests\addUserRequest;

use App\Http\Requests\editUserRequest;

use App\User;

use Illuminate\Support\Str;

use Illuminate\Http\Request;



class userController extends Controller

{

    function getUser(){

        $data['user']=User::paginate(3);

        return view('backend.user.listuser',$data);

    }



    function getAddUser(){

        return view('backend.user.adduser');

    }

    function postAddUser(addUserRequest $r){

        $user=new User();

        $user->email=$r->email;

        $user->password=bcrypt($r->password);

        $user->full_name=$r->full_name;

        $user->info = $r->info;

        $user->save();

        if ($r->hasFile('avatar')) {

            $file = $r->avatar;

            $fileName=Str::slug($user->full_name, '-').'.'.$user->id.'.'.$file->extension();

            $path = $file->storeAs('upload',$fileName,'upload');

            $user->avatar =  $path;

        }else {

            $user->avatar='upload/no-avatar.png';

        }

        $user->save();

        return redirect('/admin/user')->with('thongBao','Đã thêm thành công');

    }



    function getEditUser($userId){

        $data['user']=User::find($userId);

        return view('backend.user.edituser',$data);

    }

    function postEditUser($userId,editUserRequest $r){

        $user=User::find($userId);

        $user->email=$r->email;

        if ($r->password) {

            if (mb_strlen($r->password, 'UTF-8') < 6) {

                return redirect()->back()->withErrors(['password'=>'Password không được ít hơn 6 ký tự']);

            }

        $user->password=bcrypt($r->password);

        }

        $user->full_name=$r->full_name;

        $user->info = $r->info;

        $user->save();

        if ($r->hasFile('avatar')) {

            if ($user->avatar!='upload/no-avatar.png') {

                unlink($user->avatar);

            }

            $file = $r->avatar;

            $fileName=Str::slug($user->full_name, '-').'.'.$user->id.'.'.$file->extension();

            $path = $file->storeAs('upload',$fileName,'upload');

            $user->avatar =  $path;

        }

        $user->save();

        return redirect('/admin/user')->with('thongBao','Đã sửa thành công');

    }



    function delUser($userId){

        User::find($userId)->delete();

        return redirect('/admin/user')->with('thongBao','Đã xóa thành công');

    }

}

