<?php

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
Route::get('/', function () {
    return view('welcome', ['id' => 6]);
});
Route::get('/about', function () {
    return view('about', ['id' => 70]);
})->name('about');
Route::get('/curriculum', function () {
    return view('curriculum', ['id' => 72]);
})->name('curriculum');
Route::get('/faq', function () {
    return view('faq', ['id' => 80]);
})->name('faq');
Route::get('/price', function () {
    return view('price', ['id' => 75]);
})->name('price');
Route::get('/voice', function () {
    return view('voice', ['id' => 78]);
})->name('voice');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
