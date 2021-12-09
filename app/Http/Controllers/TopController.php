<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function welcome(){
        return view('welcome', ['id' => 6]);
    }
    public function about(){
        return view('about', ['id' => 70]);
    }
    public function curriculum(){
        return view('curriculum', ['id' => 72]);
    }
    public function faq() {
        return view('faq', ['id' => 80]);
    }
    public function price() {
        return view('price', ['id' => 75]);
    }
    public function voice() {
        return view('voice', ['id' => 78]);
    }
    public function discount() {
        return view('discount', ['id' => 78]);
    }
    public function counseling() {
        return view('counseling', ['id' => 78]);
    }
    public function reserve() {
        return view('reserve', ['id' => 78]);
    }
}
