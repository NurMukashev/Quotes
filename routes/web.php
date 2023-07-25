<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/quotes')->name('home');

Route::resource('authors',\App\Http\Controllers\AuthorController::class)->except(['show']);
Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except(['show']);
Route::resource('quotes', \App\Http\Controllers\QuoteController::class)->except(['show']);

Route::get('quotes/{id}', function (string $id){
    return new \App\Http\Resources\QuoteResource(\App\Models\Quote::findOrFail($id));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
