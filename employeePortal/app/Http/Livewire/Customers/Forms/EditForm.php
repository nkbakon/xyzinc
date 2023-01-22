<?php

namespace App\Http\Livewire\Customers\Forms;

use Livewire\Component;

class EditForm extends Component
{
    public $customer;

    public function rules()
    {
        return [
            'customer.name' => 'required',
            'customer.email' => 'required|unique:customers,email,' . $this->customer->id,
            'customer.status' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate($this->rules());

        $editCustomer = $this->validate();

        $this->customer->update($editCustomer);
        
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function render()
    {
        return view('customers.components.edit-form');
    }
}
