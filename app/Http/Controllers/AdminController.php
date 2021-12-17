<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:admin']);
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function editCurriculum(){
        return view('admin.edit-curriculum');
    }
    public function postCurriculum(){
        return view('admin.post-curriculum');
    }
    public function editLesson(){
        return view('admin.edit-lesson');
    }
    public function postLesson(){
        return view('admin.post-lesson');
    }
    public function editReview(){
        return view('admin.edit-review');
    }
    public function postReview(){
        return view('admin.post-review');
    }
    public function editTest(){
        return view('admin.edit-test');
    }
    public function postTest(){
        return view('admin.post-test');
    }
    public function gallery(){
        return view('admin.gallery');
    }
    public function mediaNew(){
        return view('admin.media-new');
    }
    public function editUser(){
        return view('admin.edit-user');
    }
    public function postUser(){
        return view('admin.post-user');
    }
    public function payments(){
        return view('admin.payments');
    }
    public function reserve(){
        return view('admin.reserve');
    }
    public function contact(){
        return view('admin.contact');
    }
    public function editNotice(){
        return view('admin.edit-notice');
    }
    public function postNotice(){
        return view('admin.post-notice');
    }
    public function options(){
        return view('admin.options');
    }
    public function faq(){
        return view('admin.faq');
    }
    public function profile(){
        return view('admin.profile');
    }
    public function postProfile(){
        return view('admin.post-profile');
    }
}
