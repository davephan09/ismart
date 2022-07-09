<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.users.index', [
            'title' => 'Trang quản trị',
            'user' => $user,
        ]);
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.users.edit', [
            'title' => 'Cập nhật tài khoản',
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->userService->update($request);
        if ($result) {
            return redirect('/admin/');
        }
        return redirect()->back();
    }

    public function logout()
    {
        if (Auth::check()) {
        Auth::logout();
        return redirect('/admin/users/login');
        } else {
            return false;
        }
    }
}
