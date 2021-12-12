<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function mypage(){
        return view('user.mypage');
    }
    public function myfaq(){
        return view('user.myfaq');
    }
    public function archiveCurriculum(){
        return view('user.archive-curriculum');
    }
    public function archiveTest(){
        return view('user.archive-test');
    }
    public function setup(){
        return view('user.setup');
    }
    public function curriculumTemp(){
        return view('user.curriculum-temp');
    }
    public function testTemp(){
        return view('user.test-temp');
    }
    public function lessonTemp(){
        return view('user.lesson-temp');
    }
    public function reviewTemp(){
        return view('user.review-temp');
    }
    public function resultTemp(){
        return view('user.result-temp');
    }
    public function contact(){
        return view('user.contact');
    }
    public function contactComplete(Request $request){
        return view('user.contact-complete');
    }
}
