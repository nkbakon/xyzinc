<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    
    public function index()
    {        
        return view('employees.index');
    }

    public function create()
    {
        return view('employees.create');
    }

    public function edit(User $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        $employee = User::find($request->employee_id);
        if($employee)
        {
            $employee->delete();
            return redirect()->route('employees.index')->with('delete', 'Employee deleted successfully.');
        }
        else
        {
            return redirect()->route('employees.index')->with('delete', 'No Employee found!.');
        }
    }
}