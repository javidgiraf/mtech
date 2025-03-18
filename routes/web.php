<?php

use App\Http\Controllers\AccessPermissionController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/clear-cache', function(){
    Artisan::call('optimize:clear');

    return response()->json([
        'success' => true,
        'message' => 'All Cache cleared successfully'
    ], 200);
})->name('clear-cache');

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
});

