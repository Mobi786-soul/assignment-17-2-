<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Simple route examples
Route::get('/hello', function () {
    return 'Welcome to My Laravel App!';
});

Route::get('/blade', function () {
    return view('hello');
});

Route::get('/greeting', function () {
    return view('greeting', ['name' => 'Faiza']);
});

// PageController routes
Route::get('/message', [PageController::class, 'showMessage']);
Route::get('/blade-view', [PageController::class, 'showBlade']);
Route::get('/layout-home', function () {
    return view('home');
});
Route::get('/cvo', function () {
    return view('home');
});

// ContactController routes
Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/submit-form', [ContactController::class, 'handleForm']);

// ProductController routes
Route::get('/insert-demo-products', [ProductController::class, 'insertDemoProducts']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);


use App\Http\Controllers\AdminController;

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->middleware('isadmin');


use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');