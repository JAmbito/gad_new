<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        return $request->only('email', 'password');
    }

    public function redirectTo(): string
    {
        $user = $this->guard()->user();

        if ($user && $user->is_password_default) {
            return '/security/change_password';
        }

        return '/dashboard';
    }
}
