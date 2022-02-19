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

Route::get('/',[\App\Http\Controllers\MainController::class,'index'])->name('home');
Route::get('/search',[\App\Http\Controllers\MainController::class,'indexSearch'])->name('search');


Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){

    Route::get('/',[\App\Http\Controllers\Admin\MainController::class,'index'])->name('admin.index');
    Route::resource('categories' , \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags' , \App\Http\Controllers\Admin\TagController::class);
    Route::resource('posts' , \App\Http\Controllers\Admin\PostController::class);
    Route::resource('comments' , \App\Http\Controllers\Admin\CommentController::class);
    Route::resource('users' , \App\Http\Controllers\Admin\UserController::class);

});

Route::group(['middleware'=>'auth'],function (){

    Route::get('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');
    Route::resource('comments',\App\Http\Controllers\Admin\CommentController::class);

});

Route::group(['middleware'=>'guest'],function () {

    Route::get('register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create');
    Route::post('register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');
    Route::get('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');

});

 Route::get('post/{slug}',[\App\Http\Controllers\PostController::class, 'show']);
 Route::get('contact',function (){
     return view('front.contact');
 });
