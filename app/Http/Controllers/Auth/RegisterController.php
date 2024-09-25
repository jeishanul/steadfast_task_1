<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register($role)
    {
        return view('auth.register', compact('role'));
    }

    public function registerRequest(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return $this->redirectUser();
    }

    protected function redirectUser()
    {
        $user = Auth::user();

        if ($user->role->value === 'admin') {
            return to_route('admin.category.index')->withSuccess(__('Login successfully'));
        }

        return to_route('user.submitted.forms.index')->withSuccess(__('Login successfully'));
    }
}
