<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Curriculum;
use App\Models\Lesson;
use App\Models\Notice;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Test;
use App\Models\User;
use App\Models\UserCurriculum;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:user']);
    }
    public function mypage(){
        $cnt_lesson = UserLesson::where('user_id', Auth::user()->id)->where('status', 1)->get()->count();
        $lesson_ids = UserLesson::where('user_id', Auth::user()->id)->where('status', 0)->pluck('lesson_id');
        $lessons = Lesson::with('curriculum')->whereHas('curriculum', function($query){$query->where('public_status', 1)->whereNull('deleted_at');})
            ->whereIn('id', $lesson_ids)->where('public_status', 1)->whereNull('deleted_at')->get();
        $curriculum_ids = UserCurriculum::where('user_id', Auth::user()->id)->where('status', 1)->pluck('curriculum_id');
        $curriculum = Curriculum::with('review')->with('test')->whereIn('id', $curriculum_ids)->whereNull('deleted_at')->get();

        $total_lessons = Lesson::all()->count();
        $percent = 0;
        $grade = '白帯';
        if($total_lessons != 0){
            $percent = (int)($cnt_lesson / $total_lessons * 100);
            if($percent==100){
                $grade = '虹帯';
            }
            else if($percent > 90){
                $grade = '黒帯';
            }
            else if($percent > 80){
                $grade = '茶帯';
            }
            else if($percent > 70){
                $grade = '紫帯';
            }
            else if($percent > 60){
                $grade = '緑帯';
            }
            else if($percent > 50){
                $grade = 'オレンジ帯';
            }
            else if($percent > 40){
                $grade = '黄帯';
            }
            else if($percent > 30){
                $grade = '水帯';
            }
        }


        return view('user.mypage', compact('cnt_lesson', 'lessons', 'curriculum', 'grade'));
    }
    public function myfaq(){
        return view('user.myfaq');
    }
    public function archiveCurriculum(){
        $curriculum = Curriculum::where('public_status', 1)->whereNull('deleted_at')->get();
        return view('user.archive-curriculum', compact('curriculum'));
    }
    public function searchCurriculum(Request $request){
        $curriculum = Curriculum::where('title', '%' . $request->keyword . '%')->orWhere('detail', '%' . $request->keyword . '%')->whereNull('deleted_at')->get();
        return view('user.archive-curriculum', compact('curriculum'));
    }
    public function archiveTest(){
        $test = Test::with('curriculum')->whereHas('curriculum', function($query){$query->where('public_status', 1)->whereNull('deleted_at');})
            ->with('lesson')
            ->where('public_status', 1)->whereNull('deleted_at')->get()->toArray();
        foreach ($test as $id => $item){
            if(isset($item->lesson)){
                if($item->lesson->public_status != 1 && isset($item->lesson->deleted_at)){
                    unset($test[$id]);
                }
            }
        }
        return view('user.archive-test', compact('test'));
    }
    public function setup(){
        $user = User::where('id', Auth::user()->id)->get()->first();
        $pay = Payment::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->take(5)->get();
        $pay_cnt = Payment::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()->count();
        return view('user.setup', compact('user', 'pay', 'pay_cnt'));
    }
    public function userModify(Request $request){
        User::where('id', Auth::user()->id)->update([
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['status' => true]);
    }

    public function curriculumTemp($id){
        $curriculum = Curriculum::with('review')->with('test')->where('id', $id)->get()->first();
        $lessons = Lesson::with('review')->where('curriculum_id', $id)->where('public_status', 1)->whereNull('deleted_at')->get();
        $tmp = UserCurriculum::where('user_id', Auth::user()->id)->where('curriculum_id', $id)->get()->first();
        $finish = 0;
        if(isset($tmp)){
            $finish = 1;
        }
        return view('user.curriculum-temp', compact('curriculum', 'lessons', 'finish'));
    }
    public function curriculumFinish(Request $request){
        UserCurriculum::create([
            'user_id' => Auth::user()->id,
            'curriculum_id' => $request->id,
            'status' => 1
        ]);
        return response()->json(['status' => true]);
    }

    public function testTemp($id){
        $test = Test::with('curriculum')->find($id);
        return view('user.test-temp', compact('test'));
    }

    public function lessonTemp($id){
        $lesson = Lesson::with('curriculum')->find($id);
        $tmp = UserLesson::where('user_id', Auth::user()->id)->where('lesson_id', $id)->get()->first();
        $finish = 0;
        if(isset($tmp)){
            if($tmp->status == 1){
                $finish = 1;
            }
        }
        else{
            UserLesson::create([
                'user_id' => Auth::user()->id,
                'lesson_id' => $id,
                'status' => 0
            ]);
        }
        return view('user.lesson-temp', compact('lesson', 'finish'));
    }
    public function lessonFinish(Request $request){
        UserLesson::where('user_id', Auth::user()->id)->where('lesson_id', $request->id)->update([
            'status' => 1
        ]);
        return response()->json(['status' => true]);
    }
    public function reviewTemp($id){
        $review = Review::with('curriculum')->find($id);
        return view('user.review-temp', compact('review'));
    }
    public function resultTemp(){
        return view('user.result-temp');
    }
    public function contact(){
        return view('user.contact');
    }
    public function contactComplete(Request $request){
        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'detail' => $request->detail
        ]);
        return view('user.contact-complete');
    }

    public function getNotice(Request $request){
        $notice = Notice::where('public_status', 1)->get();
        return view('user.layouts.notice-list', compact('notice'));
    }
}
