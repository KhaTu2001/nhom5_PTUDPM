<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\UserVerify;
use App\Jobs\SendVerifyEmailJob;
use App\Mail\ForgetPassword;
class AuthService
{
    // Xác thực người dùng
    public function authenticate($request): bool
    {
        $remember = $request->has('remember') ? true : false;

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Sai định dạng email',
            'password.required' => 'Chưa nhập mật khẩu'
        ]);

        if (Auth::attempt($credentials, $remember)) {
            return true;
        }
        return false;
    }

    // Cập nhật mật khẩu
    public function updatePassword($request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return false;
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return true;
    }
    public function create($data){
        return User::create($data);
    }
    //Yêu cầu cấp lại mật khẩu
    public function requestForgotPassword($request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(32);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        SendVerifyEmailJob::dispatch($request->email, new ForgetPassword($token));
    }
    public function checkTokenExists($token)
    {
        return $check = DB::table('password_resets')->where('token', $token)->exists();
    }

    // Đặt lại mật khẩu
    public function submitResetPasswordForm($request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $resetPassword = DB::table('password_resets')
            ->where('token', $request->token)
            ->first();

        User::where('email', $resetPassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $resetPassword->email)->delete();
    }

}
