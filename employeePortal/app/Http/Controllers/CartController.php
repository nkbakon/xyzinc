<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('site.cartpage');
    }

    public function create()
    {
        return view('site.checkout');
    }
}
