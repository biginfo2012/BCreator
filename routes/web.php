<?php

use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
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
Route::post('save-reserve', [TopController::class, 'saveReserve'])->name('save-reserve');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => 'auth'], function (){
    /*user part*/
    Route::get('mypage', [UserController::class, 'mypage'])->name('mypage');
    Route::get('myfaq', [UserController::class, 'myfaq'])->name('myfaq');
    Route::get('archive-curriculum', [UserController::class, 'archiveCurriculum'])->name('archive-curriculum');
    Route::get('archive-test', [UserController::class, 'archiveTest'])->name('archive-test');
    Route::get('setup', [UserController::class, 'setup'])->name('setup');
    Route::get('curriculum-temp', [UserController::class, 'curriculumTemp'])->name('curriculum-temp');
    Route::get('contact', [UserController::class, 'contact'])->name('contact');
    Route::post('contact-complete', [UserController::class, 'contactComplete'])->name('contact-complete');
    Route::get('test-temp', [UserController::class, 'testTemp'])->name('test-temp');
    Route::get('lesson-temp', [UserController::class, 'lessonTemp'])->name('lesson-temp');
    Route::get('review-temp', [UserController::class, 'reviewTemp'])->name('review-temp');
    Route::get('result-temp', [UserController::class, 'resultTemp'])->name('result-temp');
});
require __DIR__.'/auth.php';
