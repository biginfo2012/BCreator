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
//        Permission::create(['name' => 'admin']);
//        Permission::create(['name' => 'user']);

//        $super = User::where('role', 1)->get();
//        foreach ($super as $user){
//            $user->givePermissionTo('admin');
//        }
//
//        $user = User::where('role', 2)->get();
//        foreach ($user as $u){
//            $u->givePermissionTo('user');
//        }

        User::where('id', Auth::user()->id)->update(['login_at' => date('Y-m-d H:i:s')]);

        if(Auth::user()->status == 0 || isset(Auth::user()->deleted_at)){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }

        if(Auth::user()->role == 1){
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        else{
            return redirect()->intended(RouteServiceProvider::MYPAGE);
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
