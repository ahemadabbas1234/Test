<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {

    if(!session::has('username'))
    {
       return view('login');
    }
    return view('index');
    // return view('/add_user');
    // else
    // {

    // return view('/add_user');
    // }
});

Route::post('/login',[Logincontroller::class,'login']);

Route::get('/add_user',[Logincontroller::class,'user_data']);

Route::post('/add_user_post',[Logincontroller::class,'addUser']);

Route::get('/delete/{id}',[Logincontroller::class,'delete']);

Route::get('/update_user/{id}',[Logincontroller::class,'update']);
Route::post('/update_user_post',[Logincontroller::class,'update_user_post_co']);

Route::get('/logout',function(){

	if(session::has('username'))
	{
		Session::flush();
		return view('login');
	}

});

