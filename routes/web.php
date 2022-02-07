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
Route::get('terms', [TopController::class, 'terms'])->name('terms');
Route::get('price', [TopController::class, 'price'])->name('price');
Route::get('voice', [TopController::class, 'voice'])->name('voice');
Route::get('discount', [TopController::class, 'discount'])->name('discount');
Route::get('counseling', [TopController::class, 'counseling'])->name('counseling');
Route::get('reserve', [TopController::class, 'reserve'])->name('reserve');
Route::post('save-reserve', [TopController::class, 'saveReserve'])->name('save-reserve');
Route::get('withdrawal-complete', [TopController::class, 'withdrawalComplete'])->name('withdrawal-complete');
Route::group(['middleware' => 'auth'], function (){
    /*user part*/
    Route::group(['middleware' => ['permission:user|admin']], function () {
        Route::get('mypage', [UserController::class, 'mypage'])->name('mypage');
        Route::get('myfaq', [UserController::class, 'myfaq'])->name('myfaq');
        Route::get('archive-curriculum', [UserController::class, 'archiveCurriculum'])->name('archive-curriculum');

        Route::get('archive-test', [UserController::class, 'archiveTest'])->name('archive-test');
        Route::get('setup', [UserController::class, 'setup'])->name('setup');
        Route::post('user-modify', [UserController::class, 'userModify'])->name('user-modify');
        Route::post('pay-modify', [UserController::class, 'payModify'])->name('pay-modify');

        Route::get('curriculum/{id}', [UserController::class, 'curriculumTemp'])->name('curriculum-temp');
        Route::post('curriculum-finish', [UserController::class, 'curriculumFinish'])->name('curriculum-finish');

        Route::get('contact', [UserController::class, 'contact'])->name('contact');
        Route::post('contact-complete', [UserController::class, 'contactComplete'])->name('contact-complete');

        Route::get('test/{id}', [UserController::class, 'testTemp'])->name('test-temp');
        Route::post('result-temp', [UserController::class, 'testResult'])->name('result-temp');
        Route::post('test-result', [UserController::class, 'testResult'])->name('test-result');

        Route::get('lesson/{id}', [UserController::class, 'lessonTemp'])->name('lesson-temp');
        Route::post('lesson-finish', [UserController::class, 'lessonFinish'])->name('lesson-finish');

        Route::get('review/{id}', [UserController::class, 'reviewTemp'])->name('review-temp');

        Route::post('get-calendar-data', [UserController::class, 'getCalendarData'])->name('get-calendar-data');
        Route::post('search-data', [UserController::class, 'searchData'])->name('search-data');
        Route::post('get-notice', [UserController::class, 'getNotice'])->name('get-notice');
        Route::post('check-notice', [UserController::class, 'checkNotice'])->name('check-notice');

        Route::get('withdrawal', [UserController::class, 'withdrawal'])->name('withdrawal');

        Route::post('user-exit', [UserController::class, 'userExit'])->name('user-exit');
    });


        Route::get('setup', [UserController::class, 'setup'])->name('setup');
        Route::get('withdrawal', [UserController::class, 'withdrawal'])->name('withdrawal');
        Route::post('user-exit', [UserController::class, 'userExit'])->name('user-exit');
        Route::get('contact', [UserController::class, 'contact'])->name('contact');
        Route::post('contact-complete', [UserController::class, 'contactComplete'])->name('contact-complete');
    Route::post('get-notice', [UserController::class, 'getNotice'])->name('get-notice');
    Route::post('check-notice', [UserController::class, 'checkNotice'])->name('check-notice');


    /*master part*/
    Route::prefix('master')->group(function () {
        Route::group(['middleware' => ['can:admin']], function () {
            //
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('master.dashboard');

            /*curriculum*/
            Route::get('edit-curriculum', [AdminController::class, 'editCurriculum'])->name('master.edit-curriculum');
            Route::get('post-curriculum', [AdminController::class, 'postCurriculum'])->name('master.post-curriculum');
            Route::get('modify-curriculum/{id}', [AdminController::class, 'modifyCurriculum'])->name('master.modify-curriculum');
            Route::post('save-curriculum', [AdminController::class, 'saveCurriculum'])->name('master.save-curriculum');
            Route::get('preview-curriculum/{id}', [AdminController::class, 'previewCurriculum'])->name('master.preview-curriculum');
            Route::post('delete-curriculum', [AdminController::class, 'deleteCurriculum'])->name('master.delete-curriculum');
            Route::post('restore-curriculum', [AdminController::class, 'restoreCurriculum'])->name('master.restore-curriculum');
            Route::post('complete-delete-curriculum', [AdminController::class, 'completeDeleteCurriculum'])->name('master.complete-delete-curriculum');
            Route::post('empty-trash-curriculum', [AdminController::class, 'emptyTrashCurriculum'])->name('master.empty-trash-curriculum');

            /*lesson*/
            Route::get('edit-lesson', [AdminController::class, 'editLesson'])->name('master.edit-lesson');
            Route::get('post-lesson', [AdminController::class, 'postLesson'])->name('master.post-lesson');
            Route::get('modify-lesson/{id}', [AdminController::class, 'modifyLesson'])->name('master.modify-lesson');
            Route::post('save-lesson', [AdminController::class, 'saveLesson'])->name('master.save-lesson');
            Route::get('preview-lesson/{id}', [AdminController::class, 'previewLesson'])->name('master.preview-lesson');
            Route::post('delete-lesson', [AdminController::class, 'deleteLesson'])->name('master.delete-lesson');
            Route::post('restore-lesson', [AdminController::class, 'restoreLesson'])->name('master.restore-lesson');
            Route::post('complete-delete-lesson', [AdminController::class, 'completeDeleteLesson'])->name('master.complete-delete-lesson');
            Route::post('empty-trash-lesson', [AdminController::class, 'emptyTrashLesson'])->name('master.empty-trash-lesson');

            /*review*/
            Route::get('edit-review', [AdminController::class, 'editReview'])->name('master.edit-review');
            Route::get('post-review', [AdminController::class, 'postReview'])->name('master.post-review');
            Route::get('modify-review/{id}', [AdminController::class, 'modifyReview'])->name('master.modify-review');
            Route::post('save-review', [AdminController::class, 'saveReview'])->name('master.save-review');
            Route::get('preview-review/{id}', [AdminController::class, 'previewReview'])->name('master.preview-review');
            Route::post('delete-review', [AdminController::class, 'deleteReview'])->name('master.delete-review');
            Route::post('restore-review', [AdminController::class, 'restoreReview'])->name('master.restore-review');
            Route::post('complete-delete-review', [AdminController::class, 'completeDeleteReview'])->name('master.complete-delete-review');
            Route::post('empty-trash-review', [AdminController::class, 'emptyTrashReview'])->name('master.empty-trash-review');

            //test
            Route::get('edit-test', [AdminController::class, 'editTest'])->name('master.edit-test');
            Route::get('post-test', [AdminController::class, 'postTest'])->name('master.post-test');
            Route::get('modify-test/{id}', [AdminController::class, 'modifyTest'])->name('master.modify-test');
            Route::post('save-test', [AdminController::class, 'saveTest'])->name('master.save-test');
            Route::get('preview-test/{id}', [AdminController::class, 'previewTest'])->name('master.preview-test');
            Route::post('delete-test', [AdminController::class, 'deleteTest'])->name('master.delete-test');
            Route::post('restore-test', [AdminController::class, 'restoreTest'])->name('master.restore-test');
            Route::post('complete-delete-test', [AdminController::class, 'completeDeleteTest'])->name('master.complete-delete-test');
            Route::post('empty-trash-test', [AdminController::class, 'emptyTrashTest'])->name('master.empty-trash-test');

            Route::get('gallery', [AdminController::class, 'gallery'])->name('master.gallery');
            Route::get('get-gallery', [AdminController::class, 'getGallery'])->name('master.get-gallery');
            Route::get('media-new', [AdminController::class, 'mediaNew'])->name('master.media-new');
            Route::post('save-media', [AdminController::class, 'saveMedia'])->name('master.save-media');

            Route::get('edit-user', [AdminController::class, 'editUser'])->name('master.edit-user');
            Route::get('post-user', [AdminController::class, 'postUser'])->name('master.post-user');
            Route::post('save-user', [AdminController::class, 'saveUser'])->name('master.save-user');
            Route::get('modify-user/{id}', [AdminController::class, 'modifyUser'])->name('master.modify-user');
            Route::post('delete-user', [AdminController::class, 'deleteUser'])->name('master.delete-user');
            Route::post('restore-user', [AdminController::class, 'restoreUser'])->name('master.restore-user');
            Route::post('active-user', [AdminController::class, 'activeUser'])->name('master.active-user');
            Route::post('stop-user', [AdminController::class, 'stopUser'])->name('master.stop-user');
            Route::post('complete-delete-user', [AdminController::class, 'completeDeleteUser'])->name('master.complete-delete-user');
            Route::post('empty-trash-user', [AdminController::class, 'emptyTrashUser'])->name('master.empty-trash-user');

            Route::get('payments', [AdminController::class, 'payments'])->name('master.payments');

            //questions
            Route::get('reserve', [AdminController::class, 'reserve'])->name('master.reserve');
            Route::post('empty-trash-reserve', [AdminController::class, 'emptyTrashReserve'])->name('master.empty-trash-reserve');
            Route::post('change-status-reserve', [AdminController::class, 'changeStatusReserve'])->name('master.change-status-reserve');
            Route::get('contact', [AdminController::class, 'contact'])->name('master.contact');
            Route::post('empty-trash-contact', [AdminController::class, 'emptyTrashContact'])->name('master.empty-trash-contact');
            Route::post('change-status-contact', [AdminController::class, 'changeStatusContact'])->name('master.change-status-contact');

            Route::get('edit-notice', [AdminController::class, 'editNotice'])->name('master.edit-notice');
            Route::get('post-notice', [AdminController::class, 'postNotice'])->name('master.post-notice');
            Route::get('modify-notice/{id}', [AdminController::class, 'modifyNotice'])->name('master.modify-notice');
            Route::post('save-notice', [AdminController::class, 'saveNotice'])->name('master.save-notice');
            Route::post('delete-notice', [AdminController::class, 'deleteNotice'])->name('master.delete-notice');
            Route::post('restore-notice', [AdminController::class, 'restoreNotice'])->name('master.restore-notice');
            Route::post('complete-delete-notice', [AdminController::class, 'completeDeleteNotice'])->name('master.complete-delete-notice');
            Route::post('empty-trash-notice', [AdminController::class, 'emptyTrashNotice'])->name('master.empty-trash-notice');

            Route::get('options', [AdminController::class, 'options'])->name('master.options');
            Route::post('save-options', [AdminController::class, 'saveOptions'])->name('master.save-options');
            Route::get('faq', [AdminController::class, 'faq'])->name('master.faq');
            Route::get('profile', [AdminController::class, 'profile'])->name('master.profile');
            Route::post('profile-edit', [AdminController::class, 'profileEdit'])->name('master.profile-edit');
            Route::post('my-profile', [AdminController::class, 'myProfile'])->name('master.my-profile');
//            Route::get('post-profile', [AdminController::class, 'postProfile'])->name('master.post-profile');
        });
    });
});
require __DIR__.'/auth.php';
