<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartAdminService;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartAdminService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function index()
    {
        return view('admin.carts.list', [
            'title' => 'Danh sách đơn hàng',
            'customers' => $this->cartService->getCustomer(),
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cartService->getProductForCart($customer);

        // dd($carts);
        return view('admin.carts.show', [
            'title' => "Chi tiết đơn hàng",
            'carts' => $carts,
            'customer' => $customer,
        ]);

    }

    public function search(Request $request)
    {
        $customers = $this->cartService->search($request);

        if ($customers) {
            return view('admin.carts.list', [
                'title' => 'Danh sách đơn hàng',
                'customers' => $customers,
            ]);
        }
    }

    public function listCustomer()
    {
        return view('admin.carts.list_customer', [
            'title' => 'Danh sách khách hàng',
            'customers' => $this->cartService->getCustomer(),
        ]);
    }
}
