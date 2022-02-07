<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Curriculum;
use App\Models\Lesson;
use App\Models\Notice;
use App\Models\NoticeUser;
use App\Models\Payment;
use App\Models\Review;
use App\Models\StudyHistory;
use App\Models\Test;
use App\Models\TestDetail;
use App\Models\TestQuestion;
use App\Models\TestResult;
use App\Models\User;
use App\Models\UserCurriculum;
use App\Models\UserExit;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
//    public function __construct()
//    {
//        $this->middleware(['permission:user|admin']);
//    }
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
        $curriculum = DB::select('SELECT * from `curricula` where `public_status` = 1 and `deleted_at` is null order by ISNULL(`order`) ASC');
        return view('user.archive-curriculum', compact('curriculum'));
    }

    public function archiveTest(){
        $test = Test::with('curriculum')->whereHas('curriculum', function($query){$query->where('public_status', 1)->whereNull('deleted_at');})
            ->with('lesson')->where('public_status', 1)->whereNull('deleted_at')
            ->orderByRaw("CASE WHEN `order` IS NULL THEN 0 ELSE 1 END DESC")->orderBy('order', 'ASC')->get()->toArray();
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
        $history = StudyHistory::with('curriculum')->with('lesson')->with('review')->with('test')->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')->take(30)->get();
        return view('user.setup', compact('user', 'pay', 'pay_cnt', 'history'));
    }
    public function userModify(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $data = [
                'image' => $path,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
        }
        else{
            $data = [
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
        }
        User::where('id', Auth::user()->id)->update($data);
        return response()->json(['status' => true]);
    }

    public function payModify(Request $request){
        $data = [
            'card_name' => $request->card_name,
            'card_number' => $request->card_number,
            'card_month' => $request->card_month,
            'card_year' => $request->card_year,
            'card_cvc' => $request->card_cvc,
            'card_brand' => $request->card_brand
        ];
        User::where('id', Auth::user()->id)->update($data);
        return response()->json(['status' => true]);
    }

    public function curriculumTemp($id){
        $curriculum = Curriculum::with('review')->with('test')->where('slack', $id)->get()->first();
        $lessons = Lesson::with('review')->where('curriculum_id', $curriculum->id)->where('public_status', 1)
            ->whereNull('deleted_at')->orderByRaw("CASE WHEN `order` IS NULL THEN 0 ELSE 1 END DESC")->orderBy('order', 'ASC')->get();

        $tmp = UserCurriculum::where('user_id', Auth::user()->id)->where('curriculum_id', $curriculum->id)->get()->first();
        $finish = 0;
        if(isset($tmp)){
            $finish = 1;
        }
        StudyHistory::updateOrCreate([
            'user_id' => Auth::user()->id,
            'title' => 'カリキュラム学習',
            'date' => date('Y-m-d'),
            'type' => 1,
            'curriculum_id' => $curriculum->id
        ],
            [
                'user_id' => Auth::user()->id,
                'title' => 'カリキュラム学習',
                'date' => date('Y-m-d'),
                'type' => 1,
                'curriculum_id' => $curriculum->id
        ]);
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
        $test = Test::with('curriculum')->with('dt')->where('slack', $id)->first()->toArray();
        StudyHistory::updateOrCreate([
            'user_id' => Auth::user()->id,
            'title' => 'テスト学習',
            'date' => date('Y-m-d'),
            'type' => 4,
            'test_id' => $test['id']
        ],
            [
                'user_id' => Auth::user()->id,
                'title' => 'テスト学習',
                'date' => date('Y-m-d'),
                'type' => 4,
                'test_id' => $test['id']
            ]);
        $detail_ids = TestDetail::where('test_id', $test['id'])->pluck('id');
        $question_cnt = TestQuestion::whereIn('detail_id', $detail_ids)->get()->count();
        return view('user.test-temp', compact('test', 'question_cnt'));
    }

    public function lessonTemp($id){
        $lesson = Lesson::with('curriculum')->with('review')->with('test')->with('det')
            ->where('slack', $id)->get()->first();
        $tmp = UserLesson::where('user_id', Auth::user()->id)->where('lesson_id', $lesson->id)->get()->first();
        $finish = 0;
        if(isset($tmp)){
            if($tmp->status == 1){
                $finish = 1;
            }
        }
        else{
            UserLesson::create([
                'user_id' => Auth::user()->id,
                'lesson_id' => $lesson->id,
                'status' => 0
            ]);
        }
        StudyHistory::updateOrCreate([
            'user_id' => Auth::user()->id,
            'title' => 'レッスン学習',
            'date' => date('Y-m-d'),
            'type' => 2,
            'lesson_id' => $lesson->id
        ],
            [
            'user_id' => Auth::user()->id,
            'title' => 'レッスン学習',
            'date' => date('Y-m-d'),
            'type' => 2,
                'lesson_id' => $lesson->id
        ]);
        return view('user.lesson-temp', compact('lesson', 'finish'));
    }
    public function lessonFinish(Request $request){
        UserLesson::where('user_id', Auth::user()->id)->where('lesson_id', $request->id)->update([
            'status' => 1
        ]);
        return response()->json(['status' => true]);
    }
    public function reviewTemp($id){
        $review = Review::with('curriculum')->with('det')->where('slack', $id)->get()->first();
        StudyHistory::updateOrCreate([
            'user_id' => Auth::user()->id,
            'title' => '復習学習',
            'date' => date('Y-m-d'),
            'type' => 3,
            'review_id' => $review->id
        ],
            [
                'user_id' => Auth::user()->id,
                'title' => '復習学習',
                'date' => date('Y-m-d'),
                'type' => 3,
                'review_id' => $review->id
            ]);
        return view('user.review-temp', compact('review'));
    }
    public function resultTemp(){
        return view('user.result-temp');
    }
    public function testResult(Request $request){
        $id = TestResult::create([
            'test_id' => $request->test_id,
            'user_id' => Auth::user()->id,
            'diff_time' => $request->diff_time,
            'right_cnt' => $request->right_cnt,
            'question_cnt' => $request->question_cnt
        ])->id;
        return response()->json(['status' => true]);
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
        $id = Auth::user()->id;
        $notice = Notice::with('user')
            ->withCount(['noticeuser' => function ($q) use ($id) {$q->where('user_id', $id);}])
            ->where('public_status', 1)
            ->orderBy('updated_at', 'desc')->take(5)->get();
        $notice_ids = Notice::with('user')
            ->withCount(['noticeuser' => function ($q) use ($id) {$q->where('user_id', $id);}])
            ->where('public_status', 1)
            ->orderBy('updated_at', 'desc')->take(5)->pluck('id');
        $cnt = 0;
        foreach ($notice as $item){
            if($item->noticeuser_count == 0){
                $cnt = $cnt +1;
            }
            $date1 = date('Y-m-d', strtotime($item->updated_at));
            $date2 = date('Y-m-d', time());
            $diff = abs(strtotime($date2) - strtotime($date1));

            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $times = floor(($diff)/ (60*60*24));
            $weeks = floor($days / 7);


            if($years > 0){
                $item->date_txt = $years . '年前';
            }
            else if($months > 0){
                $item->date_txt = $months . '月前';
            }
            else if($weeks > 0){
                $item->date_txt = $weeks . '週間前';
            }
            else if($days > 0){
                $item->date_txt = $days . '日前';
            }
            else if($times > 1){
                $item->date_txt = $times . '時間前';
            }
            else{
                $item->date_txt = 'たった今';
            }
        }
        return view('user.layouts.notice-list', compact('notice', 'notice_ids', 'cnt'));
    }

    public function checkNotice(Request $request){
        $notice_ids = $request->notice_ids;
        $notice_ids = json_decode($notice_ids);
        foreach ($notice_ids as $item){
            NoticeUser::updateOrCreate(['notice_id' => $item], ['user_id' => Auth::user()->id, 'notice_id' => $item]);
        }
        return response()->json(['status' => true]);
    }

    public function getCalendarData(Request $request){
        if($request->type == 'all'){
            $data = StudyHistory::where('user_id', Auth::user()->id)->get()->toArray();
        }
        else if($request->type == 'curriculum'){
            $data = StudyHistory::where('user_id', Auth::user()->id)->where('type', 1)->get()->toArray();
        }
        else if($request->type == 'lesson'){
            $data = StudyHistory::where('user_id', Auth::user()->id)->where('type', 2)->get()->toArray();
        }
        else if($request->type == 'review'){
            $data = StudyHistory::where('user_id', Auth::user()->id)->where('type', 3)->get()->toArray();
        }
        else{
            $data = StudyHistory::where('user_id', Auth::user()->id)->where('type', 4)->get()->toArray();
        }
        return response()->json(['status' => true, 'data' => $data]);
    }

    public function searchData(Request $request){
        if($request->type == 'curriculum'){
            return $this->searchCurriculum($request->keyword);
        }
        else if($request->type == 'lesson'){
            return $this->searchLesson($request->keyword, $request->curriculum_id);
        }
        else{
            return $this->searchTest($request->keyword);
        }
    }
    public function searchCurriculum($keyword){
        $curriculum = Curriculum::where('title', 'like', '%' . $keyword . '%')->orWhere('detail', 'like', '%' . $keyword . '%')->whereNull('deleted_at')->get();
        return view('user.archive-curriculum-item', ['curriculum' => $curriculum]);
    }
    public function searchLesson($keyword, $id){
        $curriculum = Curriculum::with('review')->with('test')->where('id', $id)->get()->first();
        $lessons = Lesson::with('review')->where('title', 'like', '%' . $keyword . '%')
            ->where('curriculum_id', $id)->where('public_status', 1)
            ->whereNull('deleted_at')->get();

        return view('user.curriculum-temp-item', ['lesson' => $lessons, 'curriculum' => $curriculum]);
    }
    public function searchTest($keyword){
        $test = Test::with('curriculum')->where('title', 'like', '%' . $keyword . '%')->whereHas('curriculum', function($query){$query->where('public_status', 1)->whereNull('deleted_at');})
            ->with('lesson')
            ->where('public_status', 1)->whereNull('deleted_at')->get()->toArray();
        foreach ($test as $id => $item){
            if(isset($item->lesson)){
                if($item->lesson->public_status != 1 && isset($item->lesson->deleted_at)){
                    unset($test[$id]);
                }
            }
        }
        return view('user.archive-test-item', ['test' => $test]);
    }

    public function withdrawal(){
        return view('user.withdrawal');
    }
    public function withdrawalComplete(){
        return view('user.withdrawal-complete');
    }
    public function userExit(Request $request){
        UserExit::create([
            'user_id' => Auth::user()->id,
            'reason' => $request->reason,
            'comment' => $request->comment
        ]);
        User::where('id', Auth::user()->id)->update(['exit' => 1]);

        Auth::logout();

        return redirect()->route('withdrawal-complete');
    }
}
