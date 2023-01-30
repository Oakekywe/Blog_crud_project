<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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
//middleware all routes
Route::middleware("auth")->group(function(){
    
    //Ui
    Route::get('/', [PageController::class,'index'])->name("home");
    Route::get('/posts/{id}', [PageController::class,'showPostById'])->name("showPostById");
    Route::get('/posts/edit_post/{id}', [PageController::class,'editPost'])->name("editPost");
    Route::get('/user/createPost', [PageController::class,'createPost'])->name("createPost");
    Route::get('/user/userProfile', [PageController::class,'userProfile'])->name("userProfile");
    Route::get('/user/contactUs', [PageController::class,'contactUs'])->name("contactUs");

    //Post backend code
    Route::get('/posts/delete_post/{id}', [PostController::class,'deletePost'])->name("deletePost")->middleware("premimumUser");
    Route::post('/posts/update_post/{id}', [PostController::class,'updatePost'])->name("updatePost")->middleware("premimumUser");
    Route::post('/user/createPost', [PostController::class,'create_post'])->name("post");
    
    
    // auth
    Route::post('/user/userProfile', [AuthController::class,'post_userProfile'])->name("post_userProfile");
    //logout
    Route::get("/logout",[AuthController::class,"logout"])->name("logout");
    
    
});

//Admin
Route::middleware("admin")->group(function(){
    
    //admin
    Route::get('/admin/index',[AdminController::class,'index'])->name('admin.index');
    //admin->contact
    Route::post('/user/contactUs', [ContactUsController::class,'sendContactMessage'])->name("sendContact");
    Route::get('/admin/contact_message/delete/{id}', [ContactUsController::class,'deleteContactMessage'])->name("deleteContactMessage");
    Route::get('/admin/contact_message',[AdminController::class,'contact_message'])->name('admin.contact_message');
    //admin->Premimum_user
    Route::get('/admin/manage_premimum_user',[AdminController::class,'manage_premimum_user'])->name('admin.manage_premimum_user');
    Route::get('/admin/manage_premimum_user/delete/{id}',[AdminController::class,'deleteUser'])->name('deleteUser');
    Route::get('/admin/manage_premimum_user/edit/{id}',[AdminController::class,'editUser'])->name('editUser');
    Route::post('/admin/manage_premimum_user/edit/{id}',[AdminController::class,'updateUser'])->name('updateUser');
    
});

//Auth
Route::middleware("guest")->group(function(){

    //login
    Route::get("/login",[AuthController::class,'login'])->name("login");
    Route::post("/login",[AuthController::class,"post_login"])->name("post_login");
    //register
    Route::get("/register",[AuthController::class,'register'])->name("register");
    Route::post("/register",[AuthController::class,'post_register'])->name("post_register");
});