<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showFormRegister()
    {
        return view('client.account.reg');
        // return view('auth.register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        /* mã hóa mật khẩu của laravelui
        $data['password'] = bcrypt($data['password']);
        dd($data);
        */

        $user = User::query()->create($data);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
}
