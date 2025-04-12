<?php

use App\Http\Controllers\Admin\AccessPermissionController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\CareerController as FrontendCareerController;
use App\Http\Controllers\Frontend\ClientController as FrontendClientController;
use App\Http\Controllers\Frontend\MailController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('auth.login');
});

Route::get('/clear-cache', function(){
    Artisan::call('optimize:clear');

    return response()->json([
        'success' => true,
        'message' => 'All Cache cleared successfully'
    ], 200);
})->name('clear-cache');

Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/blogs', [FrontendBlogController::class, 'index'])->name('blogs');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');
Route::get('/careers', [FrontendCareerController::class, 'index'])->name('careers');
Route::get('/career-form', [FrontendCareerController::class, 'careerForm'])->name('career-form');
Route::get('/clients', [FrontendClientController::class, 'index'])->name('clients');
Route::get('/product-details', [FrontendProductController::class, 'productDetails'])->name('product-details');
Route::get('/service-details', [FrontendServiceController::class, 'serviceDetails'])->name('service-details');
Route::get('/blog-details/{id}', [FrontendBlogController::class, 'blogDetail'])->name('blog-details');
Route::post('/sendContactMail', [MailController::class, 'sendContactMail'])->name('sendContactMail');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/access-controls', [AccessPermissionController::class, 'index'])->name('access-controls');
    Route::post('/save-role', [AccessPermissionController::class, 'saveRole'])->name('saveRole'); 
    Route::post('/save-permissions', [AccessPermissionController::class, 'savePermissions'])->name('savePermissions');
    Route::resource('blogs', BlogController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('sectors', SectorController::class);
    Route::resource('products', ProductController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('faqs', FaqController::class);
    Route::post('/update-product-image', [ProductController::class, 'updateProductImage'])->name('update-product-image');
});

