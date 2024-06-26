<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            return redirect('admin/dashboard')->with('status','Welcome to Admin Dashboard');
        }
        else if (Auth::user()->role_as == '2') {
            return redirect('/member/dashboard')->with('status','Welcome to Member Dashboard')->with('customClass', 'alert-success');
        }
        else if (Auth::user()->role_as == '0') {
            return redirect('/user/dashboard')->with('status','Welcome to User Dashboard')->with('customClass', 'alert-success');
        }
        else {
            return redirect('/');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
