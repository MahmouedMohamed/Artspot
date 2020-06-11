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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@complain');
Route::get('/about', function () {
    return view('about');
});
Route::get('/posts','PostsController@index')->name('posts.index');
Route::post('/posts','PostsController@store');
Route::get('/posts/create','PostsController@create');
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
