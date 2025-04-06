<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home.laravel');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('home', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('products', function () {
    return Inertia::render('Products');
})->middleware(['auth', 'verified'])->name('products.index');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/../app/Modules/Catalog/Infra/Presentation/Http/Routes/api.php';
