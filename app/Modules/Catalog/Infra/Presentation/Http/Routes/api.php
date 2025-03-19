<?php

use App\Modules\Catalog\Infra\Presentation\Http\Controllers\CategoryController;
use App\Modules\Catalog\Infra\Presentation\Http\Controllers\OptionController;
use App\Modules\Catalog\Infra\Presentation\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('/api/catalog/categories')->middleware('auth')->name('api.catalog.categories.')->group(function () {
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'delete'])->name('delete');
});

Route::prefix('/api/catalog/options')->middleware('auth')->name('api.catalog.options.')->group(function () {
    Route::post('/', [OptionController::class, 'store'])->name('store');
    Route::put('/{id}', [OptionController::class, 'update'])->name('update');
    Route::delete('/{id}', [OptionController::class, 'delete'])->name('delete');
});

Route::prefix('/api/catalog/products')->middleware('auth')->name('api.catalog.products.')->group(function () {
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'delete'])->name('delete');
});