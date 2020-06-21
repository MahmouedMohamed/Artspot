<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',function(){return View('home.index');});
Route::get('/index', 'HomeController@index')->name('home');
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/profile/{user}','ProfilesController@show');
Route::post('/profile/{user}/follow','FollowsController@store');
Route::get('/profile/{user}/edit','ProfilesController@edit');
Route::patch('/profile/{user}/edit','ProfilesController@update');
//Route::get('/posts','PostsController@index');
//Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::get('/posts/{post}','PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit','PostsController@edit');
Route::put('/posts/{post}','PostsController@update');
Route::delete('/posts/{post}','PostsController@destroy');

Route::get('/notification','UserNotificationController@show');
Route::get('/notification/readAll','UserNotificationController@read');

Route::get('/likePost/{post}','LikesController@likePost');

Auth::routes();
Auth::routes(['verify' => true]);


Broadcast::routes();
Route::get('/reports',function (){
    return 'Secret Reports';
    return view('/reports');
})->middleware('can:view_reports');   ///if he can do that ability 'policy'!
