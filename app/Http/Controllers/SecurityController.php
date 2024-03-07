<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SecurityController extends Controller
{
    public function changePassword()
    {
        $user = Auth::user();

        if (!$user->is_password_default) {
            return redirect('/dashboard');
        }

        return view('security.change_password');
    }

    public function changePasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'max:50', 'min:8'],
            'confirm' => ['required', 'max:50', 'min:8'],
        ]);

        if ($request->get('password') !== $request->get('confirm')) {
            return back()->withErrors('Passwords does not match!');
        }

        $user = Auth::user();

        if ($user) {
            $user->password =  Hash::make($request->get('password'));
            $user->is_password_default = false;
            $user->save();
            return redirect('/dashboard')->with('success', 'Password updated successfully!');
        }

        Auth::logout();
        return redirect('/login')->with('error', 'Session was expired.');
    }
}
