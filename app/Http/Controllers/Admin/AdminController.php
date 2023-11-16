<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

//use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    const DIRECTORY = 'admin.pages.admins';

    private $adminRepository;

    public $resource = 'admin';

    public function __construct(AdminRepository $adminRepository)
    {

        $this->adminRepository = $adminRepository;
        view()->share('item', $this->resource);
        view()->share('class', Admin::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $admins = Admin::query()->get();

        return view('admin.pages.admins.admin_list', compact('admins'));
    }


    public function create()
    {
        $roles = Role::where('guard_name', 'web')->get();

        return view(self::DIRECTORY . '.add_admin', get_defined_vars());


    }


    public function store(AdminRequest $request)
    {

        $data = $request;
        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'position' => $data['position'],
        ]);

        if (isset($data['role'])) {
            $role = Role::findByName($data['role']);

            DB::table('model_has_roles')->insert([
                'role_id' => $role->id,
                'model_id' => $admin->id,
                'model_type' => Admin::class,
            ]);


//            $admin->syncRoles([$data['role']]);
            $admin->assignRole($role);
//            $admin->syncRoles($role);
            $admin->syncPermissions($role->permissions);
        }
        $admins = Admin::query()->get();


        return redirect()->route('admin.admins.index');

    }


    public function show(Admin $admin)
    {
        return view('admin.pages.admins.show_admin', compact('admin'));
    }

    public function edit($id)
    {

        $admin = Admin::findOrFail($id);
        $roles = Role::query()->get();
        return view('admin.pages.admins.edit_admin', compact('admin', 'roles'));
    }


    public function update(AdminRequest $request, Admin $admin)
    {

        $role = Role::findByName($request->role);
        $roleId = DB::table('model_has_roles')
            ->where('model_type', Admin::class)
            ->where('model_id', $admin->id)
            ->update(['role_id' => $role->id]);
        $this->adminRepository->update($request, $admin);

        return redirect()->route('admin.admins.index');
    }


    public function destroy(Admin $admin)
    {
        // Update department admin_id to 1
        $admin->department()->update(['admin_id' => 1]);
        // Remove all roles from admin
        $admin->syncRoles();
        // Delete the admin
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin has been deleted successfully.');
    }
}
