<?php

namespace App\Http\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class CustomerService
{

    public function registerCustomer($request)
    {
        try {
            Customer::create([
                'email' => (string) $request->input('email'),
            ]);
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

}