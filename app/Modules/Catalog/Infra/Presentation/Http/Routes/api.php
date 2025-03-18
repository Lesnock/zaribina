<?php

use App\Modules\Catalog\Infra\Presentation\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('auth')->name('api.catalog.categories.')->group(function () {
    Route::post('/categories', [CategoryController::class, 'store'])->name('store');
});
