<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('client.account.log');
        // return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        /*
            Hàm attempt nhận vào 2 giá tị:
                1. Mảng gồm các cột giá trị dùng để tìm kiếm trong cơ sở dữ liệu
                2. $remember: lưu giữ trạng thái đăng nhập để ko phải đăng nhập lại sau mỗi lần tắt mở trình duyệt đi 
        */
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Sai email tài khoản!',
            'password' => 'Sai mật khẩu!',
        ])->onlyInput('email');

    }
    public function logout()
    {
        Auth::logout();

        \request()->session()->invalidate();
        return redirect('/');
    }
}
