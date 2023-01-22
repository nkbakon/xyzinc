<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductView extends Component
{
    public $product;
    public $productid;
    public $stock;
    public $quantity;
    public $price;
    public $errors;

    public function mount($product)
    {
        $this->product = $product;
        $this->stock = $this->product->stock;        
    }

    public function store()
    {   
        $data['customer_id'] = Auth::guard('customers')->user()->id;
        $data['product_id'] = $this->productid;
        $data['stock'] = $this->quantity;
        $data['price'] = $this->price;

        $cart = Cart::create($data);
        if($cart){
            return redirect()->route('site.view')->with('status', 'Product add to cart successfully.');  
        }
        return redirect()->route('site.view')->with('delete', 'Product adding faild, try again.');       
        
    }
    
    public function render()
    {
        $product = $this->product;
        return view('site.components.product-view', compact('product'));
    }
}
