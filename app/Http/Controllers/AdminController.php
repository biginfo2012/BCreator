<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return response()->json(['status' => true]);

    }
    public function deleteCurriculum(Request $request){
        Curriculum::where('id', $request->id)->delete();
        return response()->json(['status' => true]);
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
