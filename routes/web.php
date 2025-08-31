<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('contacts', ContactController::class);
Route::resource('dashboards', DashboardController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('products', ProductController::class);
Route::resource('services', ServiceController::class);
Route::resource('settings', SettingController::class);
Route::resource('users', UserController::class);

Route::redirect('/', '/dashboards');
