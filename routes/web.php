<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Dimgent Technologies
|--------------------------------------------------------------------------
*/

// Static marketing pages.
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');

// Contact form submission — rate limited (5 / min / IP via AppServiceProvider).
Route::post('/contacts', [ContactController::class, 'store'])
    ->middleware('throttle:contact')
    ->name('contacts.store');
