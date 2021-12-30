<?php

use App\Http\Controllers\AdminController;
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

Route::group(['middleware' => 'auth'], function (){
    /*user part*/
    Route::group(['middleware' => ['can:user']], function () {
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

    /*master part*/
    Route::prefix('master')->group(function () {
        Route::group(['middleware' => ['can:admin']], function () {
            //
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('master.dashboard');
            Route::get('edit-curriculum', [AdminController::class, 'editCurriculum'])->name('master.edit-curriculum');
            Route::get('post-curriculum', [AdminController::class, 'postCurriculum'])->name('master.post-curriculum');
            Route::get('modify-curriculum/{id}', [AdminController::class, 'modifyCurriculum'])->name('master.modify-curriculum');
            Route::post('save-curriculum', [AdminController::class, 'saveCurriculum'])->name('master.save-curriculum');
            Route::post('delete-curriculum', [AdminController::class, 'deleteCurriculum'])->name('master.delete-curriculum');
            Route::get('edit-lesson', [AdminController::class, 'editLesson'])->name('master.edit-lesson');
            Route::get('post-lesson', [AdminController::class, 'postLesson'])->name('master.post-lesson');
            Route::get('edit-review', [AdminController::class, 'editReview'])->name('master.edit-review');
            Route::get('post-review', [AdminController::class, 'postReview'])->name('master.post-review');
            Route::get('edit-test', [AdminController::class, 'editTest'])->name('master.edit-test');
            Route::get('post-test', [AdminController::class, 'postTest'])->name('master.post-test');
            Route::get('gallery', [AdminController::class, 'gallery'])->name('master.gallery');
            Route::get('media-new', [AdminController::class, 'mediaNew'])->name('master.media-new');
            Route::get('edit-user', [AdminController::class, 'editUser'])->name('master.edit-user');
            Route::get('post-user', [AdminController::class, 'postUser'])->name('master.post-user');
            Route::get('payments', [AdminController::class, 'payments'])->name('master.payments');
            Route::get('reserve', [AdminController::class, 'reserve'])->name('master.reserve');
            Route::get('contact', [AdminController::class, 'contact'])->name('master.contact');
            Route::get('edit-notice', [AdminController::class, 'editNotice'])->name('master.edit-notice');
            Route::get('post-notice', [AdminController::class, 'postNotice'])->name('master.post-notice');
            Route::get('options', [AdminController::class, 'options'])->name('master.options');
            Route::get('faq', [AdminController::class, 'faq'])->name('master.faq');
            Route::get('profile', [AdminController::class, 'contact'])->name('master.profile');
            Route::get('post-profile', [AdminController::class, 'postProfile'])->name('master.post-profile');
        });
    });
});
require __DIR__.'/auth.php';
