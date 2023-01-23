<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartView extends Component
{
    public function render()
    {
        if(Auth::guard('customers')->check()){
            $carts = Cart::where('customer_id', Auth::guard('customers')->user()->id)->with('product')->get();
            $total = array_reduce($carts->toArray(), function ($carry, $cart) {
                return $carry + ($cart['stock'] * $cart['price']);
            }, 0);
            $total = $carts->map(function($cart) {
                return $cart['stock'] * $cart['price'];
            })->sum();
            Session::put('cart_count', $carts->count());
        }else{
            $carts = null;
            $total = 0;
        }
        return view('site.components.cart-view', [
            'carts' => $carts,
            'total' => $total
        ]);
    }
}
