<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    // 登录页面
    public function index()
    {
        return view("login.index");
    }
    // 登录行为
    public function login()
    {
        // 验证
        $this->validate(\request(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember' => 'integer'
        ]);
        // 逻辑
        $user = \request(['email', 'password']);
        $is_remember = boolval(\request('is_remember'));
        if (Auth::attempt($user, $is_remember)) {
            return redirect('/posts');
        }
        // 渲染
        return Redirect::back()->withErrors("邮箱密码不匹配");
    }
    // 登出行为
    public function logout()
    {
        Auth::logout();
        return \redirect('/login');
    }
}
