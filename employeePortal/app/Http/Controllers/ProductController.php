<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {        
        return view('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function destroy(Request $request)
    {
        $product = Product::find($request->data_id);
        if($product)
        {
            $path = $request->delete_img;
            unlink($path);
            $product->delete();
            return redirect()->route('products.index')->with('delete', 'Product deleted successfully.');
        }
        else
        {
            return redirect()->route('products.index')->with('delete', 'No Product found!.');
        }
    }
}
