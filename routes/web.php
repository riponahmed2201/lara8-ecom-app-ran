<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Test\TestController;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

Route::get('/about', [TestController::class, 'about']);
Route::get('/contact', [TestController::class, 'contact'])->name('contact');

Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');


// ALL BACKEND ROUTES

Route::prefix('admin')->group(function () {

    //ALL CATEGORY ROUTES HERE
    Route::prefix('category')->group(function () {

        Route::get('/index',[CategoryController::class,'index'])->name('category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::get('/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
        Route::get('/active/{id}',[CategoryController::class,'active'])->name('category.active');
        Route::get('/inactive/{id}',[CategoryController::class,'inactive'])->name('category.inactive');
    });
});
