<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // Giao diện đăng nhấp
    public function login()
    {
        return view('clients.login')->with('title', 'Đăng nhập');
    }
    /**
     * Xác thực đăng nhập.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        if ($this->authService->authenticate($request)) {
            return redirect()->route('users.index');
        } else return back()->with('msg','Tài khoản đăng nhập hoặc mật khẩu sai');
    }
    // forgot password 
    public function forgotPassword(){
        return view ('clients.forgot-password')->with('title', 'Quên mật khẩu');
    }
    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
