<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();
//        Permission::create(['name' => 'bank']);
//        Permission::create(['name' => 'user']);

//        $super = User::where('role', 1)->get();
//        foreach ($super as $user){
//            $user->givePermissionTo('admin');
//        }
//
        $user = User::where('role', 4)->get();
        foreach ($user as $u){
            $u->revokePermissionTo('user');
            $u->revokePermissionTo('admin');
            $u->givePermissionTo('bank');
        }

        if(Auth::user()->status == 0 || isset(Auth::user()->deleted_at) || Auth::user()->exit == 1){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->back();
        }

        if(Auth::user()->role == 1){
            User::where('id', Auth::user()->id)->update(['login_at' => date('Y-m-d H:i:s')]);
            return redirect()->intended(RouteServiceProvider::HOME);

        }
        else if(Auth::user()->role == 3){
            User::where('id', Auth::user()->id)->update(['login_at' => date('Y-m-d H:i:s')]);
            return redirect()->intended(RouteServiceProvider::MYPAGE);

        }
        else if(Auth::user()->role == 5){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->back();
        }
        else{
            User::where('id', Auth::user()->id)->update(['login_at' => date('Y-m-d H:i:s')]);
            return redirect()->intended(RouteServiceProvider::SETUP);

        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
