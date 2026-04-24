<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/data/{table}', [AdminController::class, 'data'])->name('admin.data');
Route::get('/admin/messages/{message}/reply', [AdminController::class, 'showReply'])->name('admin.messages.reply');
Route::post('/admin/messages/{message}/reply', [AdminController::class, 'storeReply'])->name('admin.messages.reply.store');
Route::get('/admin/upload-image', [AdminController::class, 'showUploadImage'])->name('admin.upload-image');
Route::post('/admin/upload-image', [AdminController::class, 'storeUploadImage'])->name('admin.upload-image.store');
