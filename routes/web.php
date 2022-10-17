<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\InterviewController;
use \App\Http\Controllers\ArticleController;
use \App\Http\Controllers\AboutController;
use \App\Http\Controllers\EmailController;

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
//Route::get('/admin/login', [AuthController::class, 'adminLoginGet'])->name('admin.login.get');




Route::view('/admin/login', 'admin.login');
Route::redirect('/admin', 'admin.login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/admin/login', [AuthController::class, 'adminLoginPost'])->name('admin.login.post');
Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => 'admin_check'], function () {
    
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/edit/{id}', [AuthController::class, 'edit'])->name('edit');
    Route::get('/adminedit/{id}', [AuthController::class, 'adminedit'])->name('adminedit');
    Route::post('/add', [AuthController::class, 'add'])->name('add');
    Route::get('/delete', [AuthController::class, 'delete'])->name('delete');

    Route::get('/news',[NewsController::class,'news'])->name('news');
    Route::post('/news/store',[NewsController::class,'store'])->name('news.store');

    Route::get('/news/newsedit/{id}',[NewsController::class,'newsedit'])->name('news.newsedit');
    Route::post('/news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');

    Route::get('/news/delete',[NewsController::class,'destroy'])->name('news.delete');

    Route::get('/interview',[InterviewController::class,'index'])->name('interview');
    Route::post('/interview/store',[InterviewController::class,'store'])->name('interview.store');
    Route::post('/interview/edit/{id}',[InterviewController::class,'edit'])->name('interview.edit');
    Route::get('/interview/intedit/{id}',[InterviewController::class,'intedit'])->name('interview.intedit');
    Route::get('/interview/delete',[InterviewController::class,'destroy'])->name('interview.delete');

    
    Route::get('/article',[ArticleController::class,'index'])->name('article');
    Route::post('/article/store',[ArticleController::class,'store'])->name('article.store');
    Route::post('/article/edit/{id}',[ArticleController::class,'edit'])->name('article.edit');
    Route::get('/article/articleedit/{id}',[ArticleController::class,'articleedit'])->name('article.articleedit');
    Route::get('/article/delete',[ArticleController::class,'destroy'])->name('article.delete');

    Route::get('/about',[AboutController::class,'index'])->name('about');
    Route::post('/about/store',[AboutController::class,'store'])->name('about.store');
    Route::post('/about/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
    Route::get('/about/aboutedit/{id}',[AboutController::class,'aboutedit'])->name('about.aboutedit');
    Route::get('/about/delete',[AboutController::class,'destroy'])->name('about.delete');

});

Route::get('/email',[EmailController::class,'create'])->name('email');
Route::post('/email/send',[EmailController::class,'sendemail'])->name('send.email');


Route::get('/home',function(){
    return view('home');
});

