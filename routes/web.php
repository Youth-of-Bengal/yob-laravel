<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardContoller:: class, 'index']);
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController:: class, 'index']);
    Route::get('/add-category', [App\Http\Controllers\Admin\CategoryController:: class, 'create']);
    Route::post('/add-category', [App\Http\Controllers\Admin\CategoryController:: class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController:: class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController:: class, 'update']);
    Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController:: class, 'destroy']);

    Route::get('/news', [App\Http\Controllers\Admin\NewsController:: class, 'index']);
    Route::get('/add-news', [App\Http\Controllers\Admin\NewsController:: class, 'create']);
    Route::post('/add-news', [App\Http\Controllers\Admin\NewsController:: class, 'store'])->name('add-news');

});