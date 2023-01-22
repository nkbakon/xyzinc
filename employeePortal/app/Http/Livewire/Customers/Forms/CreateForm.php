<?php

namespace App\Http\Livewire\Customers\Forms;

use App\Models\Customer;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CreateForm extends Component
{
    public $name;
    public $email;
    public $password;
 
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required|min:6'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {   
        $data['name'] = $this->name;
        $data['email'] = $this->email;
        $data['password'] = Hash::make($this->password);

        $customer = Customer::create($data);
        if($customer){
            return redirect()->route('sitelogin.index')->with('status', 'Account created successfully.');  
        }
        return redirect()->route('sitelogin.index')->with('delete', 'Account registration faild, try again.');       
        
    }

    public function render()
    {
        return view('site.components.create-form');
    }
}

