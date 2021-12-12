<?php

namespace App\Http\Controllers;

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
        return view('reserve-complete', compact('data'));
    }
}
