<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('site.index', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('site.view', compact('product'));
    }
}
