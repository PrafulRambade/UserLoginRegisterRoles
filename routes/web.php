<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCOntroller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::middleware(['middleware' => 'preventBackHistory'])->group(function(){
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>'isAdmin','auth'],function(){
    Route::get('dashboard',[AdminCOntroller::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminCOntroller::class,'profile'])->name('admin.profile');
    Route::get('setting',[AdminCOntroller::class,'setting'])->name('admin.setting');
    Route::get('companies',[CompanyController::class,'companies'])->name('admin.companies');
    Route::post('company_add',[CompanyController::class,'companyAdd'])->name('admin.companies');
    Route::post('user_add',[UserController::class,'userAdd'])->name('admin.useradd');
    Route::get('users',[UserController::class,'Users'])->name('admin.users');
    Route::get('author_add',[AuthorController::class,'save'])->name('admin.author_add');
    Route::get('post_add/{id}',[PostController::class,'save'])->name('admin.post_add');
    Route::get('post_index',[PostController::class,'index'])->name('admin.post_index');
});

ROute::group(['prefix'=>'user','middleware'=>'isUser','auth'],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('setting',[UserController::class,'setting'])->name('user.setting');
});