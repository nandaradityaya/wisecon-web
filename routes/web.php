<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ApplicationController;
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
Route::get('/service/{service:slug}', [FrontController::class, 'serviceDetails'])->name('front.service-details');
Route::get('/career', [FrontController::class, 'career'])->name('front.career');
Route::get('/career/{career:slug}', [FrontController::class, 'careerDetails'])->name('front.career-details');
Route::get('/product', [FrontController::class, 'product'])->name('front.product');
Route::get('/product/{product:slug}', [FrontController::class, 'productDetails'])->name('front.product-details');
Route::get('/client', [FrontController::class, 'client'])->name('front.client');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/apply', [FrontController::class, 'showApplicationForm'])->name('front.apply');

Route::post('/apply', [FrontController::class, 'storeApplication'])->name('front.apply.store');
// Route::post('/career/{career:slug}/apply', [FrontController::class, 'storeApplication'])->name('front.apply.store');

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
        Route::resource('applications', ApplicationController::class)->middleware('role:owner');
    });
});

require __DIR__.'/auth.php';
