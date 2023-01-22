<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerRegisterController extends Controller
{
    public function index()
    {
        return view('site.register');
    }
}
