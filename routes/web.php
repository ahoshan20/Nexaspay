<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin-dashboard'], 
function () {
    Route::get('/',[DashboardController::class, 'dashboard'])->name('dashboard');

    //Admin Management Routes
    Route::resource('/admin', AdminController::class);

    // Admin status Route
    Route::get('/admin/status/{id}',[AdminController::class,'status'])->name('admin.status');
});

