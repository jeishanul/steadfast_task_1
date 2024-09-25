<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginRequest(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return $this->redirectUser();
        }

        return back()->withError(__('Invalid credentials'));
    }

    protected function redirectUser()
    {
        $user = Auth::user();

        if ($user->role->value === 'admin') {
            return to_route('admin.category.index')->withSuccess(__('Login successfully'));
        }

        return to_route('user.submitted.forms.index')->withSuccess(__('Login successfully'));
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->withSuccess(__('Logout successfully'));
    }
}
