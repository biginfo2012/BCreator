<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Lesson;
use App\Models\Notice;
use App\Models\Review;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:admin']);
    }
    public function dashboard(){
        $cnt_users = User::where('role', 2)->get()->count();
        $first_date = date('Y-m-01') . ' 00:00:00';
        $cnt_month_user = User::where('role', 2)->where('created_at' ,'>=', $first_date)->get()->count();
        $current_users = User::where('role', 2)->orderBy('created_at', 'desc')->take(5)->get();
        $today = date('Y-m-d') . ' 00:00:00';
        $login_users = User::where('role', 2)->where('login_at', '>=', $today)->orderBy('login_at', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('cnt_users', 'cnt_month_user', 'current_users', 'login_users'));
    }


    public function editCurriculum(){
        $all_data = Curriculum::with('user')->get()->all();
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
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
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
            Curriculum::where('id', $request->id)->update($data);
        }
        else{
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
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
    public function deleteCurriculum(Request $request){
        Curriculum::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreCurriculum(Request $request){
        Curriculum::where('id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteCurriculum(Request $request){
        Curriculum::where('id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashCurriculum(Request $request){
        Curriculum::whereNotNull('deleted_at')->delete();
        return response()->json(['status' => true]);
    }

    public function editLesson(){
        $all_data = Lesson::with('user')->with('curriculum')->get()->all();
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
        $lesson = Lesson::find($id);
        $curriculum = Curriculum::whereNull('deleted_at')->get();
        return view('admin.post-lesson', compact('lesson', 'curriculum'));
    }
    public function saveLesson(Request $request){
        if(isset($request->id)){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'detail' => $request->detail,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $request->curriculum_id
            ];
            Lesson::where('id', $request->id)->update($data);
        }
        else{
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'detail' => $request->detail,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $request->curriculum_id
            ];
            Lesson::create($data);
        }

        return response()->json(['status' => true]);
    }
    public function deleteLesson(Request $request){
        Lesson::where('id', $request->id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        return response()->json(['status' => true]);
    }
    public function restoreLesson(Request $request){
        Lesson::where('id', $request->id)->update(['deleted_at' => null]);
        return response()->json(['status' => true]);
    }
    public function completeDeleteLesson(Request $request){
        Lesson::where('id', $request->id)->delete();
        return response()->json(['status' => true]);
    }
    public function emptyTrashLesson(Request $request){
        Lesson::whereNotNull('deleted_at')->delete();
        return response()->json(['status' => true]);
    }

    public function editReview(){
        $all_data = Review::with('user')->with('curriculum')->with('lesson')->get()->all();
        $open_data = Review::with('user')->with('curriculum')->with('lesson')->where('public_status', 1)->whereNull('deleted_at')->get();
        $draft_data = Review::with('user')->with('curriculum')->with('lesson')->where('public_status', 0)->whereNull('deleted_at')->get();
        $trash_data = Review::with('user')->with('curriculum')->with('lesson')->whereNotNull('deleted_at')->get();
        return view('admin.edit-review', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postReview(){
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::whereNull('deleted_at')->get();
        return view('admin.post-review', compact('curriculum', 'lesson'));
    }
    public function modifyReview($id){
        $review = Review::find($id);
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::whereNull('deleted_at')->get();
        return view('admin.post-review', compact('lesson', 'curriculum', 'review'));
    }
    public function saveReview(Request $request){
        if(isset($request->id)){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $curriculum_id = Lesson::where('id', $request->lesson_id)->get()->first()->curriculum_id;
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'detail' => $request->detail,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $curriculum_id,
                'lesson_id' => $request->lesson_id
            ];
            Review::where('id', $request->id)->update($data);
        }
        else{
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $curriculum_id = Lesson::where('id', $request->lesson_id)->get()->first()->curriculum_id;
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'detail' => $request->detail,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $curriculum_id,
                'lesson_id' => $request->lesson_id
            ];
            Review::create($data);
        }

        return response()->json(['status' => true]);
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
        $all_data = Test::with('user')->with('curriculum')->with('lesson')->get()->all();
        $open_data = Test::with('user')->with('curriculum')->with('lesson')->where('public_status', 1)->whereNull('deleted_at')->get();
        $draft_data = Test::with('user')->with('curriculum')->with('lesson')->where('public_status', 0)->whereNull('deleted_at')->get();
        $trash_data = Test::with('user')->with('curriculum')->with('lesson')->whereNotNull('deleted_at')->get();
        return view('admin.edit-test', compact('all_data', 'open_data', 'draft_data', 'trash_data'));
    }
    public function postTest(){
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::whereNull('deleted_at')->get();
        return view('admin.post-test', compact('curriculum', 'lesson'));
    }
    public function modifyTest($id){
        $test = Test::find($id);
        $curriculum =  Lesson::with('curriculum')->select(DB::raw('t.*'))
            ->from(DB::raw('(SELECT * FROM lessons ORDER BY created_at DESC) t'))
            ->groupBy('t.curriculum_id')
            ->get();
        $lesson = Lesson::whereNull('deleted_at')->get();
        return view('admin.post-test', compact('lesson', 'curriculum', 'test'));
    }
    public function saveTest(Request $request){
        if(isset($request->id)){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $curriculum_id = Lesson::where('id', $request->lesson_id)->get()->first()->curriculum_id;
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $curriculum_id,
                'lesson_id' => $request->lesson_id
            ];
            Test::where('id', $request->id)->update($data);
        }
        else{
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
            $curriculum_id = Lesson::where('id', $request->lesson_id)->get()->first()->curriculum_id;
            $data = [
                'title' => $request->title,
                'thumbnail' => $path,
                'slack' => $request->slack,
                'order' => $request->order,
                'public_status' => $request->public_status,
                'user_id' => Auth::user()->id,
                'curriculum_id' => $curriculum_id,
                'lesson_id' => $request->lesson_id
            ];
            Test::create($data);
        }
        return response()->json(['status' => true]);
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
        $all_data = Notice::with('user')->get()->all();
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
