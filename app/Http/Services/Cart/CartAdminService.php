<?php

namespace App\Http\Services\Cart;

use App\Models\Customer;

class CartAdminService
{

    public function getCustomer()
    {
        return Customer::where('name', '!=', '')->orderByDesc('id')->paginate(10);
    }

    public function getAllCustomer()
    {
        return Customer::orderByDesc('id')->paginate(10);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function($query) {
            $query->select('id', 'name', 'price_sale');
        }])->get();
    }

    public function search($request)
    {
        if ($request->s) {
        $key = $request->s;
        return Customer::where('name', 'like', '%'.$key.'%')
            ->orderByDesc('id')
            ->paginate(10);
        }
    }

}