<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomeController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontHomeController::class, 'index']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->namespace('Admin')->group(function(){
    Route::get('/dashboard', [DashboardContoller:: class, 'index']);
    Route::get('/category', [CategoryController:: class, 'index']);
    Route::get('/add-category', [CategoryController:: class, 'create']);
    Route::post('/add-category', [CategoryController:: class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController:: class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController:: class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController:: class, 'destroy']);

    Route::get('/news', [NewsController:: class, 'index']);
    Route::get('/add-news', [NewsController:: class, 'create']);
    Route::post('/add-news', [NewsController:: class, 'store'])->name('add-news');
    Route::post('/add-news/upload-description-image', [NewsController:: class, 'upload'])->name('news.description.image.upload');
    Route::get('edit-news/{news_id}', [NewsController:: class, 'edit']);
    Route::put('update-news/{news_id}', [NewsController:: class, 'update']);
    Route::get('delete-news/{news_id}', [NewsController:: class, 'destroy']);

    Route::get('/all-album', [AlbumController:: class, 'index']);
    Route::get('/add-album', [AlbumController:: class, 'create']);
    Route::post('/add-album', [AlbumController:: class, 'store']);
    Route::get('/view-album/{album_id}', [AlbumController:: class, 'viewAlbum'])->name('albums.view');
    Route::get('edit-album/{album_id}', [AlbumController:: class, 'edit']);
    Route::post('delete-single-image/{image_id}', [AlbumController:: class, 'deleteSingleImage']);
    Route::put('update-album/{album_id}', [AlbumController:: class, 'update']);
    Route::get('delete-album/{album_id}', [AlbumController:: class, 'destroy']);

    Route::get('/all-project', [ProjectController:: class, 'index']);
    Route::get('/add-project', [ProjectController:: class, 'create']);
    Route::post('/add-project', [ProjectController:: class, 'store']);
    Route::get('edit-project/{project_id}', [ProjectController:: class, 'edit']);
    Route::put('update-project/{project_id}', [ProjectController:: class, 'update']);
    Route::get('delete-project/{project_id}', [ProjectController:: class, 'destroy']);

    Route::get('/pages/home', [HomeController:: class, 'create']);

});