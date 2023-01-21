<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class EmployeeTable extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    public function render()
    {
        $employees = User::search($this->search)
        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
        ->paginate($this->perPage);
        return view('employees.components.employee-table', [
            'employees' => $employees
        ]);
    }
}
