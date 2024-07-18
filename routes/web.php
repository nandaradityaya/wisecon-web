<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/service', [FrontController::class, 'service'])->name('front.service');
Route::get('/service/{service:slug}', [FrontController::class, 'servicesDetail'])->name('front.service-details');

Route::get('/admin/homes', function () {
    return view('admin.homes.index');
})->middleware(['auth', 'verified'])->name('admin.homes.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('homes', HomeSliderController::class)->middleware('role:owner');
        Route::resource('abouts', AboutController::class)->middleware('role:owner');
        Route::resource('services', ServiceController::class)->middleware('role:owner');
        Route::resource('faqs', FrequentlyAskedQuestionController::class)->middleware('role:owner');
        Route::resource('careers', CareerController::class)->middleware('role:owner');
        Route::resource('clients', ClientController::class)->middleware('role:owner');
        Route::resource('contacts', ContactController::class)->middleware('role:owner'); 
        Route::resource('teams', TeamController::class)->middleware('role:owner'); 
        Route::resource('products', ProductController::class)->middleware('role:owner'); 
    });
});

require __DIR__.'/auth.php';
