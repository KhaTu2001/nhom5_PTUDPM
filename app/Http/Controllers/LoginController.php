<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // Giao diện đăng nhập
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
    //quên mật khẩu
    public function forgotPassword(){
        return view ('clients.forgot-password')->with('title', 'Quên mật khẩu');
    }
    //Giao diện đăng kí
    public function signup(){
        return view('clients.signup')->with('title', 'Đăng kí tài khoản');
    }
    //Xử lý đăng kí
    public function create(SignupRequest $request){
        $data = $request->except('_token','password_confirmation');
        $data['password'] = bcrypt($request->password);
        $this->authService->create($data);
        return redirect()->route('login')->with('msg','Đăng kí tài khoản thành công');
    }
    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
