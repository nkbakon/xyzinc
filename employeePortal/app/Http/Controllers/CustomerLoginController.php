<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }
}
