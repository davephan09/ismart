<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Login',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->input());
        $this->validate($request, [
            'username' => 'required|',
            'password' => 'required',
        ]);


        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        Session::flash('error', 'Username hoặc mật khẩu không chính xác!');
        return redirect()->back();
    }
}
