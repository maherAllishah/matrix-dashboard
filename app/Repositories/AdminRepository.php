<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRepository
{
    public function add(Request $request)
    {

        if (Auth::guard('web')->user()->id != 1) {
            return abort(403);
        }
        $admin = new Admin(populateModelData($request, Admin::class));

        if ($request->has('password')) {
            $admin->password = bcrypt($request->get('password'));
        }

        $admin->syncRoles($request->get('role'));

        $admin->save();
    }

    public function update(Request $request, Admin $admin)
    {


        $admin->update(populateModelData($request, Admin::class));

        if ($request->has('password')) {
            $admin->password = bcrypt($request->get('password'));
        }

        $admin->save();
    }
}
