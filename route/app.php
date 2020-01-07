<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;


Route::post('login', 'Login/login');
Route::post('logout', 'Login/logout');
Route::post('signup', 'SignUp/signUp');

Route::group('msg', function (){
    Route::post('send', 'MsgHandler/sendMsg');
})->middleware(app\middleware\Auth::class);

Route::post('bindConnId', 'Index/bindConnId')->middleware(app\middleware\Auth::class);