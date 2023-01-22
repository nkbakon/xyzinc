<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductView extends Component
{
    public $product;
    public $productid;
    public $stock;
    public $quantity;

    public function addToCart(int $productId)
    {
        if(Auth::guard('customers')->check()){
            dd('Added to the cart');
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Login to continue',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
    
    public function render()
    {
        $product = $this->product;
        return view('site.components.product-view', compact('product'));
    }
}
