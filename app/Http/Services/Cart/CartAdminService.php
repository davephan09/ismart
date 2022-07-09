<?php

namespace App\Http\Services\Cart;

use App\Models\Customer;

class CartAdminService
{

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(10);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function($query) {
            $query->select('id', 'name', 'price_sale');
        }])->get();
    }

}