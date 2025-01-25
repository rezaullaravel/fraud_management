<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReportSubmitController;




//login form
Route::get('/login',[AuthController::class,'loginForm']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/login',[AuthController::class,'postLogin'])->name('post.login');


Route::middleware(['admin'])->group(function () {
//admin dashboard
Route::get('/admin/dashboard',[AuthController::class,'adminDashboard'])->name('admin.dashboard');
});


Route::middleware(['user'])->group(function () {
//user dashboard
Route::get('/user/dashboard',[AuthController::class,'userDashboard'])->name('user.dashboard');
    });


 /*==============frontend all route start=================================*/
 Route::get('/',[HomeController::class,'index'])->name('home');

 //report
 Route::get('/report-submit-form',[ReportSubmitController::class,'reportSubForm'])->name('report.submit');
 Route::post('/report-store',[ReportSubmitController::class,'reportStore'])->name('report.store');
 /*==============frontend all route start=================================*/

