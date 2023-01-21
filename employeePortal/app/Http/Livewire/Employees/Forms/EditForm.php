<?php

namespace App\Http\Livewire\Employees\Forms;

use Livewire\Component;
use App\Models\User;

class EditForm extends Component
{
    public $employee;

    public function rules()
    {
        return [
            'employee.name' => 'required',
            'employee.email' => 'required|unique:users,email,' . $this->employee->id,
            'employee.type' => 'required',
            'employee.status' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate($this->rules());

        $editEmployee = $this->validate();

        $this->employee->update($editEmployee);
        
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function render()
    {
        return view('employees.components.edit-form');
    }
}