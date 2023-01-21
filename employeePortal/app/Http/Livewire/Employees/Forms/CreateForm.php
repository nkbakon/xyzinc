<?php

namespace App\Http\Livewire\Employees\Forms;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CreateForm extends Component
{
    public $type;
    public $name;
    public $email;
    public $password;
 
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'type' => 'required',
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
        $data['type'] = $this->type;
        $data['password'] = Hash::make($this->password);

        $user = User::create($data);
        if($user){
            return redirect()->route('employees.index')->with('status', 'Employee created successfully.');  
        }
        return redirect()->route('employees.index')->with('delete', 'Employee registration faild, try again.');       
        
    }

    public function mount()
    {
        $this->type = '';
    }
    public function render()
    {
        return view('employees.components.create-form');
    }
}

