<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmplyeeRepositiry
{
    public function add(Request $request)
    {
        $employee = new Employee(populateModelData($request, Employee::class));
        $employee->file_one_path = uploadFile('file_one_path', 'employees');
        $employee->file_two_path = uploadFile('file_two_path', 'employees');

        $employee->save();
    }

    public function update(Request $request, Employee $employee)
    {

        $employee->update(populateModelData($request, Employee::class));

        $employee->save();
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
    }
}
