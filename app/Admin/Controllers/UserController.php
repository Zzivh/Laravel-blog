<?php

namespace App\Admin\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\AdminUser;
use Illuminate\Http\Request;
class UserController extends BaseController
{
    // 管理员列表页面
    public function index()
    {
        $users = AdminUser::paginate(10);
        return view('/admin/user/index', compact('users'));
    }
    // 管理员创建页面
    public function create()
    {
        return view('/admin/user/add');
    }
    // 创建逻辑
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'password' => 'required'
        ]);
//        $this->validate(\request(),[
//           'name' => 'required|min:3',
//           'password' => 'required'
//        ]);
        $name = request('name');
        $password = bcrypt(request('password'));
        AdminUser::create(compact('name','password'));
        return redirect('/admin/users');
    }
}
