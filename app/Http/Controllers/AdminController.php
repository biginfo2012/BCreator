<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Contact;
use App\Models\Curriculum;
use App\Models\Lesson;
use App\Models\LessonDetail;
use App\Models\Media;
use App\Models\Notice;
use App\Models\NoticeUser;
use App\Models\Payment;
use App\Models\Reserve;
use App\Models\Review;
use App\Models\ReviewDetail;
use App\Models\SiteSetting;
use App\Models\StudyHistory;
use App\Models\Test;
use App\Models\TestDetail;
use App\Models\TestQuestion;
use App\Models\TestQuestionItem;
use App\Models\User;
use App\Models\UserCurriculum;
use App\Models\UserExit;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:admin']);
    }
    public function dashboard(){
        $cnt_users = User::whereNull('deleted_at')->get()->count();
        $first_date = date('Y-m-01') . ' 00:00:00';
        $cnt_month_user = User::where('created_at' ,'>=', $first_date)->whereNull('deleted_at')->get()->count();
        $current_users = User::orderBy('created_at', 'desc')->take(5)->get();
        $today = date('Y-m-d') . ' 00:00:00';
        $login_users = User::where('role', '!=', 1)->whereNotNull('login_at')->where('login_at' ,'>=', $today)->orderBy('login_at', 'desc')->take(5)->get();
        $total_pay = Payment::get()->sum('amount');
        $cnt_lessons = Lesson::where('public_status', 1)->whereNull('deleted_at')->get()->count();
        return view('admin.dashboard', compact('cnt_users', 'cnt_month_user', 'current_users', 'login_users', 'total_pay', 'cnt_lessons'));
    }


    public function editCurriculum(){
        $all_data = Curriculum::with('user')->whereNull('deleted_at')->get()->all();
        $open_data = Curriculum::with('user')->where('public_status', 1)->whereNull('deleted_at')->get();
        $draft_data = Curriculum::with('user')->where('public_status', 0)->whereNull('deleted_at')->get();
        $trash_data = Curriculum::with('user')->whereNotNull('deleted_at')->get();
        return view('admin.edit-curriculum', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postCurriculum(){
        return view('admin.post-curriculum');
    }
    public function modifyCurriculum($id){
        $curriculum = Curriculum::find($id);
        return view('admin.post-curriculum', compact('curriculum'));
    }
    public function saveCurriculum(Request $request){

        if(isset($request->id)){
            $slack = Curriculum::where('id', '!=', $request->id)->where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $photo = time().'.'.$extension;
                $path = public_path().'/image';
                $uplaod = $file->move($path,$photo);
                $path = '/image/' . $photo;
                //$photo = $request->file->store('image','public');
                $data = [
                    'title' => $request->title,
                    'thumbnail' => $path,
                    'detail' => $request->detail,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id
                ];
            }
            else{
                $data = [
                    'title' => $request->title,
                    'detail' => $request->detail,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id
                ];
            }

            Curriculum::where('id', $request->id)->update($data);
        }
        else{
            $slack = Curriculum::where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'detail' => $request->detail,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id
            ];
            Curriculum::create($data);
        }

        return response()->json(['status' => true]);

    }
    public function previewCurriculum($id){
        $curriculum = Curriculum::with('review')->with('test')->where('slack', $id)->get()->first();
        $lessons = Lesson::with('review')->where('curriculum_id', $curriculum->id)->where('public_status', 1)->whereNull('deleted_at')->get();
        $tmp = UserCurriculum::where('user_id', Auth::user()->id)->where('curriculum_id', $curriculum->id)->get()->first();
        $finish = 0;
        if(isset($tmp)){
            $finish = 1;
        }
        return view('user.curriculum-temp', compact('curriculum', 'lessons', 'finish'));
    }
    public function deleteCurriculum(Request $request){
        Curriculum::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        Lesson::where('curriculum_id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        Review::where('curriculum_id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        Test::where('curriculum_id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreCurriculum(Request $request){
        Curriculum::where('id', $request->id)->update(['deleted_at' => null]);
        Lesson::where('curriculum_id', $request->id)->update(['deleted_at' => null]);
        Review::where('curriculum_id', $request->id)->update(['deleted_at' => null]);
        Test::where('curriculum_id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteCurriculum(Request $request){
        Curriculum::where('id', $request->id)->delete();
        Lesson::where('curriculum_id', $request->id)->delete();
        Review::where('curriculum_id', $request->id)->delete();
        Test::where('curriculum_id', $request->id)->delete();
        UserCurriculum::where('curriculum_id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashCurriculum(Request $request){
        $curriculum_ids = Curriculum::whereNotNull('deleted_at')->pluck('id');
        Lesson::whereIn('curriculum_id', $curriculum_ids)->delete();
        Review::whereIn('curriculum_id', $curriculum_ids)->delete();
        Test::whereIn('curriculum_id', $curriculum_ids)->delete();
        UserCurriculum::whereIn('curriculum_id', $curriculum_ids)->delete();
        Curriculum::whereNotNull('deleted_at')->delete();
        return response()->json(['status' => true]);
    }

    public function editLesson(){
        $all_data = Lesson::with('user')->with('curriculum')->whereNull('deleted_at')->get()->all();
        $open_data = Lesson::with('user')->with('curriculum')->where('public_status', 1)->whereNull('deleted_at')->get();
        $draft_data = Lesson::with('user')->with('curriculum')->where('public_status', 0)->whereNull('deleted_at')->get();
        $trash_data = Lesson::with('user')->with('curriculum')->whereNotNull('deleted_at')->get();
        return view('admin.edit-lesson', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postLesson(){
        $curriculum = Curriculum::whereNull('deleted_at')->get();
        return view('admin.post-lesson', compact('curriculum'));
    }
    public function modifyLesson($id){
        $lesson = Lesson::with('det')->find($id);
        $curriculum = Curriculum::whereNull('deleted_at')->get();
        $h2_cnt = LessonDetail::where('lesson_id', $id)->where('parent_id', 0)->get()->count();
        return view('admin.post-lesson', compact('lesson', 'curriculum', 'h2_cnt'));
    }
    public function saveLesson(Request $request){
        $id = 0;
        if(isset($request->id)){
            $id = $request->id;
            $slack = Lesson::where('id', '!=', $request->id)->where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $photo = time().'.'.$extension;
                $path = public_path().'/image';
                $uplaod = $file->move($path,$photo);
                $path = '/image/' . $photo;
                //$photo = $request->file->store('image','public');
                $data = [
                    'title' => $request->title,
                    'thumbnail' => $path,
                    'comment' => $request->comment,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'time' => $request->time,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id,
                    'curriculum_id' => $request->curriculum_id
                ];
            }
            else{
                $data = [
                    'title' => $request->title,
                    'slack' => $request->slack,
                    'comment' => $request->comment,
                    'order' => $request->order,
                    'time' => $request->time,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id,
                    'curriculum_id' => $request->curriculum_id
                ];
            }

            Lesson::where('id', $request->id)->update($data);
        }
        else{
            $slack = Lesson::where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'slack' => $request->slack,
                'order' => $request->order,
                'time' => $request->time,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $request->curriculum_id
            ];
            $lesson = Lesson::create($data);
            $id = $lesson->id;
        }
        LessonDetail::where('lesson_id', $id)->delete();
        $detail = json_decode($request->detail);
        foreach($detail as $item){
            $detail_id = LessonDetail::create([
                'title' => $item->h2_title,
                'content' => $item->h2_content,
                'lesson_id' => $id,
            ])->id;
            $h3_detail = $item->h3_detail;
            if(count($h3_detail) > 0){
                foreach ($h3_detail as $tmp_item){
                    LessonDetail::create([
                        'title' => $tmp_item->h3_title,
                        'content' => $tmp_item->h3_content,
                        'lesson_id' => $id,
                        'parent_id' => $detail_id
                    ]);
                }
            }
        }

        return response()->json(['status' => true]);
    }
    public function previewLesson($id){
        $lesson = Lesson::with('curriculum')->where('slack', $id)->get()->first();
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
        return view('user.lesson-temp', compact('lesson', 'finish'));
    }
    public function deleteLesson(Request $request){
        Lesson::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        Review::where('lesson_id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        Test::where('lesson_id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreLesson(Request $request){
        Lesson::where('id', $request->id)->update(['deleted_at' => null]);
        Review::where('lesson_id', $request->id)->update(['deleted_at' => null]);
        Test::where('lesson_id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteLesson(Request $request){
        Lesson::where('id', $request->id)->delete();
        Review::where('lesson_id', $request->id)->delete();
        Test::where('lesson_id', $request->id)->delete();
        UserLesson::where('lesson_id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashLesson(Request $request){
        $lesson_ids = Lesson::whereNotNull('deleted_at')->pluck('id');
        Review::whereIn('lesson_id', $lesson_ids)->delete();
        Test::whereIn('lesson_id', $lesson_ids)->delete();
        Lesson::whereNotNull('deleted_at')->delete();
        UserLesson::whereIn('lesson_id', $lesson_ids)->delete();
        return response()->json(['status' => true]);
    }

    public function editReview(){
        $all_data = Review::with('user')->with('curriculum')->with('lesson')->whereNull('deleted_at')
            ->get()->all();
        $open_data = Review::with('user')->with('curriculum')->with('lesson')->where('public_status', 1)
            ->whereNull('deleted_at')->get();
        $draft_data = Review::with('user')->with('curriculum')->with('lesson')->where('public_status', 0)
            ->whereNull('deleted_at')->get();
        $trash_data = Review::with('user')->with('curriculum')->with('lesson')->whereNotNull('deleted_at')->get();
        return view('admin.edit-review', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postReview(){
        $curricula = Curriculum::with('review')->whereNull('deleted_at')->get();
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::with('review')->whereNull('deleted_at')->get();
        return view('admin.post-review', compact('curriculum', 'lesson', 'curricula'));
    }
    public function modifyReview($id){
        $review = Review::with('det')->find($id);
        $curricula = Curriculum::with('review')->whereNull('deleted_at')->get();
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::with('review')->whereNull('deleted_at')->get();
        $h2_cnt = ReviewDetail::where('review_id', $id)->where('parent_id', 0)->get()->count();
        return view('admin.post-review', compact('lesson', 'curriculum', 'review', 'curricula', 'h2_cnt'));
    }
    public function saveReview(Request $request){
        $lesson = $request->lesson_id;
        $str_arr = explode('-', $lesson);
        $curriculum_id = $str_arr[0];
        $lesson_id = empty($str_arr[1]) ? null : $str_arr[1];
        $id = 0;
        if(isset($request->id)){
            $id = $request->id;
            $slack = Review::where('id', '!=', $request->id)->where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $photo = time().'.'.$extension;
                $path = public_path().'/image';
                $uplaod = $file->move($path,$photo);
                $path = '/image/' . $photo;
                //$photo = $request->file->store('image','public');
                $data = [
                    'title' => $request->title,
                    'thumbnail' => $path,
                    'detail' => $request->detail,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id,
                    'curriculum_id' => $curriculum_id,
                    'lesson_id' => $lesson_id
                ];
            }
            else{

                $data = [
                    'title' => $request->title,
                    'detail' => $request->detail,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id,
                    'curriculum_id' => $curriculum_id,
                    'lesson_id' => $lesson_id
                ];
            }
            Review::where('id', $request->id)->update($data);
        }
        else{
            $slack = Review::where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/image/' . $photo;
            //$photo = $request->file->store('image','public');

            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'detail' => $request->detail,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $curriculum_id,
                'lesson_id' => $lesson_id
            ];
            $id = Review::create($data)->id;
        }
        ReviewDetail::where('review_id', $id)->delete();
        $detail = json_decode($request->detail);
        foreach($detail as $item){
            $detail_id = ReviewDetail::create([
                'title' => $item->h2_title,
                'content' => $item->h2_content,
                'review_id' => $id,
            ])->id;
            $h3_detail = $item->h3_detail;
            if(count($h3_detail) > 0){
                foreach ($h3_detail as $tmp_item){
                    ReviewDetail::create([
                        'title' => $tmp_item->h3_title,
                        'content' => $tmp_item->h3_content,
                        'review_id' => $id,
                        'parent_id' => $detail_id
                    ]);
                }
            }
        }
        return response()->json(['status' => true]);
    }
    public function previewReview($id){
        $review = Review::with('curriculum')->where('slack', $id)->get()->first();
        return view('user.review-temp', compact('review'));
    }
    public function deleteReview(Request $request){
        Review::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreReview(Request $request){
        Review::where('id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteReview(Request $request){
        Review::where('id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashReview(Request $request){
        Review::whereNotNull('deleted_at')->delete();
        return response()->json(['status' => true]);
    }

    /*test*/
    public function editTest(){
        $all_data = Test::with('user')->with('curriculum')->with('lesson')->whereNull('deleted_at')
            ->get()->all();
        $open_data = Test::with('user')->with('curriculum')->with('lesson')->where('public_status', 1)
            ->whereNull('deleted_at')->get();
        $draft_data = Test::with('user')->with('curriculum')->with('lesson')->where('public_status', 0)
            ->whereNull('deleted_at')->get();
        $trash_data = Test::with('user')->with('curriculum')->with('lesson')->whereNotNull('deleted_at')
            ->get();
        return view('admin.edit-test', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postTest(){
        $curricula = Curriculum::with('test')->whereNull('deleted_at')->get();
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::whereNull('deleted_at')->get();
        return view('admin.post-test', compact('curriculum', 'lesson', 'curricula'));
    }
    public function modifyTest($id){
        $test = Test::with('dt')->find($id);
//        print_r($test);
//        die();
        $curricula = Curriculum::with('test')->whereNull('deleted_at')->get();
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::whereNull('deleted_at')->get();
        $h2_cnt = TestDetail::where('test_id', $id)->where('parent_id', 0)->get()->count();
        $detail_ids = TestDetail::where('test_id', $id)->pluck('id');
        $question_cnt = TestQuestion::whereIn('detail_id', $detail_ids)->get()->count();
        return view('admin.post-test', compact('lesson', 'curriculum', 'test', 'curricula', 'h2_cnt', 'question_cnt'));
    }
    public function saveTest(Request $request){
        $lesson = $request->lesson_id;
        $str_arr = explode('-', $lesson);
        $curriculum_id = $str_arr[0];
        $lesson_id = empty($str_arr[1]) ? null : $str_arr[1];

        if(isset($request->id)){
            $id = $request->id;
            $slack = Test::where('id', '!=', $request->id)->where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $photo = time().'.'.$extension;
                $path = public_path().'/image';
                $uplaod = $file->move($path,$photo);
                $path = '/image/' . $photo;
                //$photo = $request->file->store('image','public');

                $data = [
                    'title' => $request->title,
                    'thumbnail' => $path,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id,
                    'curriculum_id' => $curriculum_id,
                    'lesson_id' => $lesson_id
                ];
            }
            else{
                $data = [
                    'title' => $request->title,
                    'slack' => $request->slack,
                    'order' => $request->order,
                    'public_status' => $request->public_status,
                    'user_id' => Auth::user()->id,
                    'curriculum_id' => $curriculum_id,
                    'lesson_id' => $lesson_id
                ];
            }

            Test::where('id', $request->id)->update($data);
        }
        else{
            $slack = Test::where('slack', $request->slack)->first();
            if(isset($slack)){
                return response()->json(['status' => false]);
            }
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $curriculum_id,
                'lesson_id' => $lesson_id
            ];
            $id = Test::create($data)->id;
        }
        $detail_ids = TestDetail::where('test_id', $id)->pluck('id');
        foreach ($detail_ids as $di){
            $question_ids = TestQuestion::where('detail_id', $di)->pluck('id');
            TestQuestionItem::whereIn('question_id', $question_ids)->delete();
            TestQuestion::where('detail_id', $di)->delete();
        }
        TestDetail::where('test_id', $id)->delete();
        $detail = json_decode($request->detail);
        foreach($detail as $item){
            $detail_id = TestDetail::create([
                'title' => $item->h2_title,
                'content' => $item->h2_content,
                'test_id' => $id,
            ])->id;
            $h2_question = $item->h2_question;
            if(count($h2_question) > 0){
                foreach ($h2_question as $tmp_item){
                    $test_question_id = TestQuestion::create([
                        'detail_id' => $detail_id,
                        'question_tag' => $tmp_item->question_tag
                    ])->id;
                    $question_answer = $tmp_item->question_answer;
                    if(count($question_answer) > 0){
                        foreach ($question_answer as $index => $answer_item){
                            if($index == 0){
                                $data = [
                                    'question_id' => $test_question_id,
                                    'type' => 1,
                                    'item' => $answer_item
                                ];
                            }
                            else{
                                $data = [
                                    'question_id' => $test_question_id,
                                    'item' => $answer_item
                                ];
                            }
                            TestQuestionItem::create($data);
                        }
                    }
                }
            }
            $h3_detail = $item->h3_detail;
            if(count($h3_detail) > 0){
                foreach ($h3_detail as $tmp_item){
                    $detail3_id = TestDetail::create([
                        'title' => $tmp_item->h3_title,
                        'content' => $tmp_item->h3_content,
                        'test_id' => $id,
                        'parent_id' => $detail_id
                    ])->id;
                    $h3_question = $tmp_item->h3_question;
                    if(count($h3_question) > 0){
                        foreach ($h3_question as $tmp3_item){
                            $test_question_id = TestQuestion::create([
                                'detail_id' => $detail3_id,
                                'question_tag' => $tmp3_item->question_tag
                            ])->id;
                            $question_answer = $tmp3_item->question_answer;
                            if(count($question_answer) > 0){
                                foreach ($question_answer as $index => $answer_item){
                                    if($index == 0){
                                        $data = [
                                            'question_id' => $test_question_id,
                                            'type' => 1,
                                            'item' => $answer_item
                                        ];
                                    }
                                    else{
                                        $data = [
                                            'question_id' => $test_question_id,
                                            'item' => $answer_item
                                        ];
                                    }
                                    TestQuestionItem::create($data);
                                }
                            }
                        }
                    }
                }
            }
        }
        return response()->json(['status' => true]);
    }
    public function previewTest($id){
        $test = Test::with('curriculum')->with('dt')->where('slack', $id)->first()->toArray();
        $detail_ids = TestDetail::where('test_id', $test['id'])->pluck('id');
        $question_cnt = TestQuestion::whereIn('detail_id', $detail_ids)->get()->count();
        return view('user.test-temp', compact('test', 'question_cnt'));
    }
    public function deleteTest(Request $request){
        Test::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreTest(Request $request){
        Test::where('id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteTest(Request $request){
        Test::where('id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashTest(Request $request){
        Test::whereNotNull('deleted_at')->delete();
        return response()->json(['status' => true]);
    }

    public function gallery(){
        $page_start = 1;
        $page_end = 40;
        $limit = $page_end - $page_start;
        $media = Media::offset($page_start-1)->limit($limit)->get();
        $count = Media::get()->count();
        $page = (int)($count / 40);
        if($count > $page * 40){
            $page = $page + 1;
        }
        if($page_end > $count){
            $page_end = $count;
        }
        $current_page = 1;
        return view('admin.gallery', compact('media', 'count', 'page', 'page_start' , 'page_end', 'current_page'));
    }
    public function getGallery(Request $request){
        $current_page = $request->current_page;
        $page_start = ($current_page - 1) * 40;
        $page_end = $current_page * 40;
        $limit = $page_end - $page_start;
        $media = Media::offset($page_start-1)->limit($limit)->get();
        $count = Media::get()->count();
        $page = (int)($count / 40);
        if($count > $page * 40){
            $page = $page + 1;
        }
        if($page_end > $count){
            $page_end = $count;
        }
        return view('admin.get-gallery', compact('media', 'count', 'page', 'page_start' , 'page_end', 'current_page'));
    }
    public function mediaNew(){
        return view('admin.media-new');
    }
    public function saveMedia(Request $request){
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension(); // you can also use file name
        $photo = time().'.'.$extension;
        $path = public_path().'/image';
        $uplaod = $file->move($path,$photo);
        $path = '/image/' . $photo;
        Media::create([
            'image' => $path
        ]);
        return response()->json(['status' => true]);
    }

    public function editUser(){
        $all_data = User::whereNull('deleted_at')->get()->all();
        $stop_data = User::where('status', 0)->whereNull('deleted_at')->get();
        $trash_data = User::whereNotNull('deleted_at')->get();
        return view('admin.edit-user', compact('all_data', 'stop_data', 'trash_data'));
    }
    public function postUser(){
        return view('admin.post-user');
    }
    public function saveUser(Request $request){
        if(isset($request->id)){
            User::where('email', $request->email)->where('id', '!=', $request->id)->get()->first();
            if(isset($user)){
                return response()->json(['status' => false]);
            }
            if(isset($request->password)){
                User::where('id', $request->id)->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'status' => $request->status,
                ]);
            }
            else{
                User::where('id', $request->id)->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'status' => $request->status,
                ]);
            }
            $user = User::find($request->id);
            if($request->role == 1){
                $user->givePermissionTo('admin');
            }
            else if($request->type == 4){
                $user->givePermissionTo('bank');
            }
            else{
                $user->givePermissionTo('user');
            }
        }
        else{
            $user = User::where('email', $request->email)->get()->first();
            if(isset($user)){
                return response()->json(['status' => false]);
            }
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => $request->status,
            ]);
            if($request->role == 1){
                $user->givePermissionTo('admin');
            }
            else if($request->type == 4){
                $user->givePermissionTo('bank');
            }
            else{
                $user->givePermissionTo('user');
            }
        }


        return response()->json(['status' => true]);
    }
    public function modifyUser($id){
        $user = User::find($id);
        return view('admin.post-user', compact('user'));
    }
    public function deleteUser(Request $request){
        User::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreUser(Request $request){
        User::where('id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteUser(Request $request){
        User::where('id', $request->id)->delete();
        Card::where('user_id', $request->id)->delete();
        NoticeUser::where('user_id', $request->id)->delete();
        StudyHistory::where('user_id', $request->id)->delete();
        UserCurriculum::where('user_id', $request->id)->delete();
        UserExit::where('user_id', $request->id)->delete();
        UserLesson::where('user_id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashUser(Request $request){
        $user_ids = User::whereNotNull('deleted_at')->pluck('id');
        User::whereNotNull('deleted_at')->delete();
        Card::whereIn('user_id', $user_ids)->delete();
        NoticeUser::whereIn('user_id', $user_ids)->delete();
        StudyHistory::whereIn('user_id', $user_ids)->delete();
        UserCurriculum::whereIn('user_id', $user_ids)->delete();
        UserExit::whereIn('user_id', $user_ids)->delete();
        UserLesson::whereIn('user_id', $user_ids)->delete();
        return response()->json(['status' => true]);
    }
    public function activeUser(Request $request){
        User::where('id', $request->id)->update(['status' => 1]);
        return response()->json(['status' => true]);
    }
    public function stopUser(Request $request){
        User::where('id', $request->id)->update(['status' => 0]);
        return response()->json(['status' => true]);
    }

    public function payments(){
        $payments = Payment::with('user')->whereNull('deleted_at')->get()->all();
        return view('admin.payments', compact('payments'));
    }

    public function reserve(){
        $all_data = Reserve::get()->all();
        $open_data = Reserve::where('status', 0)->get();
        $draft_data = Reserve::where('status', 1)->get();
        $trash_data = Reserve::where('status', 2)->get();
        return view('admin.reserve', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function emptyTrashReserve(Request $request){
        Reserve::where('status', 2)->delete();
        return response()->json(['status' => true]);
    }
    public function changeStatusReserve(Request $request){
        Reserve::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['status' => true]);
    }
    public function contact(){
        $all_data = Contact::get()->all();
        $open_data = Contact::where('status', 0)->get();
        $draft_data = Contact::where('status', 1)->get();
        $trash_data = Contact::where('status', 2)->get();
        return view('admin.contact', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function emptyTrashContact(Request $request){
        Contact::where('status', 2)->delete();
        return response()->json(['status' => true]);
    }
    public function changeStatusContact(Request $request){
        Contact::where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['status' => true]);
    }

    public function editNotice(){
        $all_data = Notice::with('user')->whereNull('deleted_at')->get()->all();
        $open_data = Notice::with('user')->where('public_status', 1)->whereNull('deleted_at')->get();
        $draft_data = Notice::with('user')->where('public_status', 0)->whereNull('deleted_at')->get();
        $trash_data = Notice::with('user')->whereNotNull('deleted_at')->get();
        return view('admin.edit-notice', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postNotice(){
        return view('admin.post-notice');
    }
    public function modifyNotice($id){
        $notice = Notice::find($id);
        return view('admin.post-notice', compact('notice'));
    }
    public function saveNotice(Request $request){
        if(isset($request->id)){
            $data = [
                'title' => $request->title,
                'detail' => $request->detail,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id
            ];
            Notice::where('id', $request->id)->update($data);
        }
        else{
            $data = [
                'title' => $request->title,
                'detail' => $request->detail,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id
            ];
            Notice::create($data);
        }
        return response()->json(['status' => true]);

    }
    public function deleteNotice(Request $request){
        Notice::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreNotice(Request $request){
        Notice::where('id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteNotice(Request $request){
        Notice::where('id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashNotice(Request $request){
        Notice::whereNotNull('deleted_at')->delete();
        return response()->json(['status' => true]);
    }

    public function options(){
        $site_setting = SiteSetting::where('id', 1)->get()->first();
        return view('admin.options', compact('site_setting'));
    }
    public function saveOptions(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/images';
            $uplaod = $file->move($path,$photo);
            $path = '/images/' . $photo;
            SiteSetting::where('id', 1)->update([
                'site_title'=>$request->site_title,
                'site_description' => $request->site_description,
                'company_name' => $request->company_name,
                'address' => $request->address,
                'logo' => $path
            ]);
        }

        SiteSetting::where('id', 1)->update([
            'site_title'=>$request->site_title,
            'site_description' => $request->site_description,
            'company_name' => $request->company_name,
            'address' => $request->address
        ]);

        return response()->json(['status' => true]);
    }
    public function faq(){
        return view('admin.faq');
    }
    public function profile(){
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }
    public function profileEdit(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/image/' . $photo;
            User::where('id', Auth::user()->id)->update([
                'company_name'=>$request->company_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'image' => $path,
            ]);
        }
        else{
            User::where('id', Auth::user()->id)->update([
                'company_name'=>$request->company_name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);
        }
        return response()->json(['status' => true]);
    }
    public function myProfile(Request $request){
        User::where('id', Auth::user()->id)->update([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['status' => true]);
    }
}
