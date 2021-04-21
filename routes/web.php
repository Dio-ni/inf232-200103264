<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UploadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|php
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "view('welcoe')";
});
Route::get('/home', function () {

    return view('home');
});
Route::get('/home/{l}', function ($l) {
    App::setlocale($l);
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/file', function () {
    return view('file_upload');
});
Route::get('/my_works', function () {
    return view('MY_WORKS');
});



Route::get('/​post/create', function () {
    DB::table('post')->insert([
        'title' => 'Title',
        'body' => 'Body part'

    ]);
});
Route::get('/​post', function () {
    $post = Post::find(1);
    return $post;
});







//required param. and optinal
Route::get('/p/{id}/{text?}', function ($id, $text = "some text") {
    return "Your id is :" . $id . " " . $text;
});
//regular expression constraints +means at least 1 digit or letter
Route::get('/name/{name?}', function ($name = "Dayana") {
    return "Your name is :" . $name;
});
Route::get('/test/{name}', function ($name) {
    return "Your name is :" . $name;
});
//call Controllers function
//we can skip @index if there are only one method __(double_)invoke
Route::get('/invoke/{id}/{date}/{book_title}', "App\Http\Controllers\Dayana_Controller@index");

Route::get('/student', "App\Http\Controllers\Dayana_Controller@index");



//Route::resource('/student2',"App\Http\Controllers\Dayana_Controller");
//call php(html) + give param
Route::get('/testphp', function () {
    return view('test', ['name' => 'Daiako', 'age' => 1]);
});

Route::get('/testphp2', function () {
    return view('test')->with('name', 'Daiako')->with('age', 18);
});


//Controllers

Route::get('blog', [BlogController::class, 'index']);

Route::get('blog/create', function () {
    return view('blog.create');
});

Route::post('blog/create', [BlogController::class, 'store'])->name('add-blog');


//Test

Route::get('post/{id}', [BlogController::class, 'get_post']);

//Uploading file

Route::get('/uploadfile', [UploadFileController::class, 'index']);
Route::post('/uploadfile',  [UploadFileController::class, 'showUploadFile']);


// email sender
Route::get('mail/send', [MailController::class, 'send']);

Route::view('upload', 'upload');
Route::post('upload', [UploadController::class, 'index'])->name('add');
