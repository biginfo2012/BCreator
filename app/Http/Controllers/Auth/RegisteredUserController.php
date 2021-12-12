<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

//        event(new Registered($user));
//
//        Auth::login($user);

//        return redirect(RouteServiceProvider::CHECKOUT);
        $user_id = $user->id;
        $password = $request->password;
        return view('auth.checkout', compact('user_id', 'password'));
    }

    public function checkout(Request $request){
        $user_id = $request->user_id;
        if($request->pay_setting == 2){
            User::where('id', $user_id)->update(['pay_setting' => $request->pay_setting]);
        }
        else{
            $data = [
                'card_name' => $request->card_name,
                'card_number' => $request->card_number,
                'card_date' => $request->card_date,
                'card_cvc' => $request->card_cvc
            ];
            User::where('id', $user_id)->update($data);
        }
        $user = User::where('id', $user_id)->first();
        $password = $request->password;
        return view('auth.register-complete', compact('user', 'password'));
    }
}
