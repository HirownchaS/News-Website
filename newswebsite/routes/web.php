<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\editController;
use App\Http\Controllers\useraddController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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
 Route::view('/home','home');
// Route::view('/login','login');
// Route::post('/store',[registerController::class,'store']);
// Route::get('authenticate/{name}',[LoginController::class,'authenticate']);
 Route::view('addnews','addnews');
 Route::post('adminAddnews',[useraddController::class,'store']);
// Route::view('retrivenews','retrivenews');
// Route::get('allnews',[useraddController::class,'view'])->name('allnews');
// Route::get('delete/{id}', [deleteController::class, 'destroy'])->name('delete.destroy');

// Route::get('edit-news/{id}',[editcontroller::class,'edit'])->name('edit.edit');
// Route::put('update-news/{id}',[editController::class,('update')])->name('edit.update');

 Route::get('forgot',[ForgotPasswordController::class,'showForgotPassword']);
 Route::post('forgot-password',[ForgotPasswordController::class,'submitForgotPasswordForm'])->name('forgot.password.post');
 Route::get('reset-password/{token}',[ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
 Route::post('reset-password',[ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['auth', 'is_verify_email']);
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
Route::view('admindashboard','admin.admindashboard');
Route::view('adminAddnews','admin.adminAddnews');

Route::group(['middleware'=>'auth'], function () {
	// Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'HomeController@allUsers']);
	Route::get('permissions-admin',['middleware'=>'check-permission:admin|author','uses'=>'HomeController@admin']);
	Route::get('permissions-author',['middleware'=>'check-permission:author','uses'=>'HomeController@author']);
});
