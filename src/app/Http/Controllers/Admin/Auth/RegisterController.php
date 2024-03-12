<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\AdminUser;
use App\Http\Requests\Admin\AdminUserRegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegisterForm()
    {
        return view('auth.register', ['authgroup' => 'admin']);
    }

    protected function create(AdminUserRegisterRequest $request)
    {
        $admin = AdminUser::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('admin/login');
    }
}
