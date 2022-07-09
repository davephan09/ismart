<?php

namespace App\Http\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{

    public function update($request)
    {
        try {
            $userAuth = Auth::user();
            $user = User::where('id', $userAuth->id)->first();
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật tài khoản thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi: Cập nhật tài khoản không thành công');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}
