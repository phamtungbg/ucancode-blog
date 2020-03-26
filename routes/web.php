<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('', 'homeController@getIndex');
Route::group(['prefix' => 'blog'], function () {
    Route::get('{blogSlug}.html', 'blogController@getBlog');
});
Route::get('{slugCate}.html', 'homeController@getCate');

//Backend
Route::get('login','backend\loginController@getLogin')->middleware('CheckLogout');
Route::post('login','backend\loginController@postLogin');
Route::get('logout','backend\loginController@getLogout');

Route::group(['prefix' => 'admin','middleware'=>'CheckLogin'], function () {
    Route::get('/','backend\indexController@getIndex');

    Route::group(['prefix' => 'blog'], function () {
        Route::get('','backend\blogController@getBlog');
        Route::get('add','backend\blogController@getAddBlog');
        Route::post('add','backend\blogController@postAddBlog');
        Route::get('edit/{blogId}','backend\blogController@getEditBlog');
        Route::post('edit/{blogId}','backend\blogController@postEditBlog');
        Route::get('del/{blogId}','backend\blogController@delBlog');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('','backend\categoryController@getCategory');
        Route::post('','backend\categoryController@postAddCategory');
        Route::get('edit/{idCate}','backend\categoryController@getEditCategory');
        Route::post('edit/{idCate}','backend\categoryController@postEditCategory');
        Route::get('del/{idCate}','backend\categoryController@delCategory');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('','backend\userController@getUser');
        Route::get('add','backend\userController@getAddUser');
        Route::post('add','backend\userController@postAddUser');
        Route::get('edit/{userId}','backend\userController@getEditUser');
        Route::post('edit/{userId}','backend\userController@postEditUser');
        Route::get('del/{userId}','backend\userController@delUser');
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('','backend\slideController@getSlide');
        Route::post('upload','backend\slideController@uploadSlide');
        Route::post('add','backend\slideController@addSlide');
        Route::post('del','backend\slideController@delSlide');
    });
    Route::group(['prefix' => 'footer'], function () {
        Route::get('','backend\footerController@getFooter');
        Route::post('','backend\footerController@postFooter');
        Route::post('post-icon','backend\footerController@postIcon');
        Route::post('edit-icon','backend\footerController@editIcon');
        Route::post('del-icon','backend\footerController@delIcon');
    });
});


