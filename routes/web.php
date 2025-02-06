<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReportSubmitController;
use App\Http\Controllers\Admin\AllReportController;




//login form
Route::get('/login',[AuthController::class,'loginForm']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/login',[AuthController::class,'postLogin'])->name('post.login');


Route::middleware(['admin'])->prefix('admin')->group(function () {
//admin dashboard
Route::get('dashboard',[AuthController::class,'adminDashboard'])->name('admin.dashboard');

//all report
Route::get('all/report',[AllReportController::class,'index'])->name('admin.report.index');
Route::get('details/report/{id}',[AllReportController::class,'reportDetails'])->name('admin.report.details');
Route::get('show/report/{id}',[AllReportController::class,'reportShow'])->name('admin.report.show');
Route::get('hide/report/{id}',[AllReportController::class,'reportHide'])->name('admin.report.hide');
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

