<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

function goodType($good_id){
    switch ($good_id) {
        case 0:
            return "会員月額";
        case 1:
            return "飲み放題";
        case 2:
            return "ヴーヴクリコ";
        case 3:
            return "ポルフィディオ";
        case 4:
            return "クエルボ1800アネホ";
        case 5:
            return "グレンリヴェット12年";
        case 6:
            return "セクションを追加";
        case 7:
            return "セクションを延長";
    }
    return "";
}

function substrwords($text, $maxchar, $end='...') {
    if (mb_strlen($text) > $maxchar) {
        $len = mb_strlen($text);
        $output = mb_substr($text, 0, $maxchar, 'utf-8');

        $output .= $end;
    }
    else {
        $output = $text;
    }
    return $output;
}

function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function sendRegisterEmail($data, $email){
    $details = $data;
    Mail::to($email)->send(new \App\Mail\UserRegisterMail($details));
}
function sendBankRegisterEmail($data, $email){
    $details = $data;
    Mail::to($email)->send(new \App\Mail\BankUserRegisterMail($details));
}
function sendReserveEmail($data, $email){
    $details = $data;
    Mail::to($email)->send(new \App\Mail\ReserveMail($details));
}
