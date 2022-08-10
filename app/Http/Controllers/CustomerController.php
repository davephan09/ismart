<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $result = $this->customerService->registerCustomer($request);
        if ($result!== false) {
            return redirect()->back();
        }
        return false;
    }
}
