<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('site.index', compact('products'));
    }

    public function show($product)
    {
        $product = Product::find($product);
        return view('site.view', compact('product'));
    }

    public function store(Request $request)
    {
        $stock = $request->input('stock');

        $request->validate([
            'customer_id' => 'required',
            'quantity' => 'required|numeric|min:1|max:' .$stock,], 
            [
            'customer_id.required' => 'You must login first',
            'quantity.max' => 'Not enough stocks',
        ]);

        Cart::create([
            'customer_id' => $request->input('customer_id'),
            'product_id' => $request->input('productid'),
            'stock' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        $product = Product::find($request->productid);
        if($product->stock >= $request->input('quantity')){
            $product->update([
                'stock' => $product->stock - $request->input('quantity'),
            ]);
        }else{
            return redirect()->back()->with('delete', 'Not enough stocks');
        }

        return redirect()->back()->with('status', 'Item added to the cart successfully.');        
    }
}
