<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*TOP Pages*/
Route::get('/', [TopController::class, 'welcome'])->name('home');
Route::get('about', [TopController::class, 'about'])->name('about');
Route::get('curriculum', [TopController::class, 'curriculum'])->name('curriculum');
Route::get('faq', [TopController::class, 'faq'])->name('faq');
Route::get('price', [TopController::class, 'price'])->name('price');
Route::get('voice', [TopController::class, 'voice'])->name('voice');
Route::get('discount', [TopController::class, 'discount'])->name('discount');
Route::get('counseling', [TopController::class, 'counseling'])->name('counseling');
Route::get('reserve', [TopController::class, 'reserve'])->name('reserve');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
