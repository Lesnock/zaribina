<?php

use App\Modules\Catalog\Infra\Presentation\Http\Controllers\CategoryController;
use App\Modules\Catalog\Infra\Presentation\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('auth')->name('api.catalog.categories.')->group(function () {
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'delete'])->name('delete');
});

Route::prefix('api')->middleware('auth')->name('api.catalog.options.')->group(function () {
    Route::post('/', [OptionController::class, 'store'])->name('store');
    Route::put('/{id}', [OptionController::class, 'update'])->name('update');
    Route::delete('/{id}', [OptionController::class, 'delete'])->name('delete');
});