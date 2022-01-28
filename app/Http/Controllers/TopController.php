<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Reserve;
use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function welcome(){
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
    public function curriculum(){
        return view('curriculum');
    }
    public function faq() {
        return view('faq');
    }
    public function terms() {
        return view('terms');
    }
    public function price() {
        return view('price');
    }
    public function voice() {
        return view('voice');
    }
    public function discount() {
        return view('discount');
    }
    public function counseling() {
        return view('counseling');
    }
    public function reserve() {
        return view('reserve');
    }
    public function saveReserve(Request $request) {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'first_date' => date('Y-m-d', strtotime($request->first_date)),
            'first_time' => $request->first_time,
            'second_date' => date('Y-m-d', strtotime($request->second_date)),
            'second_time' => $request->second_time
        ];
        Reserve::create($data);
        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'number' => $request->number,
            'first_date' => date('Y年m月d日', strtotime($request->first_date)) . ' ' . $request->first_time,
            'second_date' => date('Y年m月d日', strtotime($request->second_date)) . ' ' . $request->second_time,
        ];
        sendReserveEmail($details, $request->email);
        return view('reserve-complete', compact('data'));
    }

    public function getNotice(Request $request){
        $notice = Notice::where('public_status', 1)->get();
        return view('user.layouts.notice-list', compact('notice'));
    }
    public function withdrawalComplete(){
        return view('user.withdrawal-complete');
    }
}
