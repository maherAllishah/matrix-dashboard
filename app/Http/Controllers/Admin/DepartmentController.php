<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartmentRequest;
use App\Models\Admin;
use App\Models\Department;

class DepartmentController extends BaseController
{
    public function __construct()
    {
        parent::__construct(DepartmentRequest::class);
    }

    protected $model = Department::class;
    protected $resource = 'departments';


    public function edit($id)
    {
        $admins = Admin::all();
        $data = $this->model::query()->findOrFail($id);
        return view(self::DIRECTORY . "$this->resource.edit", compact('admins'), compact('data'));
    }

    public function create()
    {
        $admins = Admin::all();
        return view(self::DIRECTORY . "$this->resource.create", compact('admins'));
    }

}
