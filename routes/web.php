<?php

use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProfileController;
use App\Models\Option;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/produtos', function () {
        return Inertia::render('Produtos/List');
    })->name('produtos.index');

    Route::get('/produtos/create', function () {
        return Inertia::render('Produtos/Create');
    })->name('produtos.create');

    Route::get('/opcionais', function () {
        return Inertia::render('Opcionais/List', [
            'options' => Option::all()
        ]);
    })->name('options.index');

    Route::get('/opcionais/create', function () {
        return Inertia::render('Opcionais/Form');
    })->name('options.create');

    Route::get('/opcionais/edit/{id}', function ($id) {
        $option = Option::with('values')->findOrFail($id);
        return Inertia::render('Opcionais/Form', [
            'option' => $option
        ]);
    })->name('options.edit');

    Route::post('/opcionais', [OptionController::class, 'store'])->name('options.store');
    Route::put('/opcionais/{id}', [OptionController::class, 'update'])->name('options.update');
    Route::delete('/opcionais/{id}', [OptionController::class, 'destroy'])->name('options.destroy');
});

require __DIR__.'/auth.php';
