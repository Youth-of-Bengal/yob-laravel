<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardContoller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DescriptionController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontAboutController;
use App\Http\Controllers\Frontend\FrontNewsController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Frontend\FrontProjectController;
use App\Http\Controllers\Frontend\FrontGalleryController;
use App\Http\Controllers\Frontend\FrontNews_SingleController;
use App\Http\Controllers\Frontend\FrontContactController;
use App\Http\Controllers\Frontend\FrontMemberController;
use App\Http\Controllers\Frontend\SingleAlbumImagesController;
use App\Http\Controllers\Payment\DonationController;
use App\Http\Controllers\Payment\RazorpayController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [DashboardContoller:: class, 'logout'])->name('logout2');

// User..
Route::get('/', [FrontHomeController::class, 'index']);
Route::get('/projects', [FrontProjectController::class, 'index']);
Route::get('/gallery', [FrontGalleryController::class, 'index']);
Route::get('/about', [FrontAboutController::class, 'index']);
Route::get('/album/{album_id}', [FrontGalleryController::class, 'index']);
Route::get('/news', [FrontNewsController::class, 'index']);
Route::get('/news/{news_id}', [FrontNews_SingleController::class, 'show']);
Route::get('/category/{category_id}', [FrontNews_SingleController::class, 'showCategory']);
Route::get('/gallery/{album_id}', [SingleAlbumImagesController::class, 'index'])->name('frontend.album.view');
Route::get('/contact', [FrontContactController::class, 'index']);
Route::post('/contact/store', [FrontContactController::class, 'store']);
Route::get('/member', [FrontMemberController::class, 'index']);
Route::post('member/store', [FrontMemberController::class, 'store']);
Route::get('/member/dashboard', [MemberController::class, 'index']);
Route::get('/user/dashboard', [UserController::class, 'index']);

// One-time donation
Route::get('/donation', [DonationController::class, 'showDonationForm'])->name('donation');
Route::post('/donation', [DonationController::class, 'makeDonation'])->name('donation.makeDonation');
Route::get('/donation/success', [DonationController::class, 'donationSuccess'])->name('donation.success');
Route::get('/donation/failure', [DonationController::class, 'donationFailure'])->name('donation.failure');
Route::get('/donate',[RazorpayController::class,'index']);
Route::post('razorpay-payment',[RazorpayController::class,'store'])->name('razorpay.payment.store');

// Admin..
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

    Route::get('/pages/home/{id}', [HomeController:: class, 'index']);
    Route::post('/pages/home/update', [HomeController:: class, 'update']);
    
    Route::get('/pages/contact/{id}', [ContactController:: class, 'index']);
    Route::post('/pages/contact/update', [ContactController:: class, 'update']);

    Route::get('/about/description/{id}', [DescriptionController:: class, 'index']);
    Route::post('/about/description/update', [DescriptionController:: class, 'update']);

    Route::get('/user_contact_details', [UserContactController:: class, 'index']);

    Route::get('about/departments', [DepartmentController:: class, 'index']);
    Route::get('about/add-department', [DepartmentController:: class, 'create']);
    Route::post('about/add-department', [DepartmentController:: class, 'store']);
    Route::get('about/edit-department/{department_id}', [DepartmentController:: class, 'edit']);
    Route::put('about/update-department/{department_id}', [DepartmentController:: class, 'update']);
    Route::get('about/delete-department/{department_id}', [DepartmentController:: class, 'destroy']);

    Route::get('about/team', [TeamController:: class, 'index']);
    Route::get('about/add-team-member', [TeamController:: class, 'create']);
    Route::post('about/add-team-member', [TeamController:: class, 'store'])->name('add.team.member');
    Route::get('about/edit-team-member/{team_member_id}', [TeamController:: class, 'edit']);
    Route::put('about/update-team-member/{team_member_id}', [TeamController:: class, 'update']);
    Route::get('about/delete-team-member/{team_member_id}', [TeamController:: class, 'destroy']);

});