<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerLoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('customers')->attempt($credentials) && (Auth::guard('customers')->user()->status == 'Active')) {
            return redirect()->intended(route('site.index'));
        }
        else if(Auth::guard('customers')->attempt($credentials) && (Auth::guard('customers')->user()->status == 'Deactivate')){
            return redirect()->route('sitelogin.index')->with('delete', 'Your account is deactivated.');
        }
        return redirect()->route('sitelogin.index')->with('delete', 'Invalid username or password');
    }
    
}
