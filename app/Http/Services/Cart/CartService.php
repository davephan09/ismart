<?php

namespace App\Http\Services\Cart;

use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function add($qty, $product_id)
    {
        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác!');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty,
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
    }

    public function addToCart($id)              //Xử lý Thêm giỏ hàng trực tiếp button
    {
        $qty = 1;
        $product_id = $id;

        return $this->add($qty, $product_id);
    }

    public function create($request)            //Xử lý thêm giỏ hàng sản phẩm 
    {
        $qty = (int)$request->input('num-product');
        $product_id = (int)$request->input('product_id');

        return $this->add($qty, $product_id);
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::where('active', 1)
                ->whereIn('id', $productId)
                ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num-product'));
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function removeAll()
    {
        $carts = Session::get('carts');
        foreach ($carts as $key => $cart) {
        unset($carts[$key]);
        Session::put('carts', $carts);
        }
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');
            if (is_null($carts)) return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'note' => $request->input('note'),
                'method' => $request->input('method'),
            ]);

            $products = $this->inforProductCart($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'Đặt hàng thành công');

            #Queue
            SendMail::dispatch($customer, $products)->delay(now()->addSeconds(2));

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt hàng lỗi, Vui lòng thử lại');
            return false;
        }
    }

    protected function inforProductCart($carts, $customerId)
    {
        $productId = array_keys($carts);
        $products = Product::where('active', 1)
                ->whereIn('id', $productId)
                ->get();

        $data = [];

        foreach ($products as $key => $product) {
            $data[] = [
                'customer_id' => $customerId,
                'product_id' => $product->id,
                'qty' => $carts[$product->id],
                'price' => $product->price_sale,
            ];
        }

        return Cart::insert($data);
    }

}
