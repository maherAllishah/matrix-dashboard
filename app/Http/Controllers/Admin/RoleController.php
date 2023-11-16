<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    const DIRECTORY = 'admin.pages.roles';

    private $roleRepository;

    public $resource = 'role';

    public function __construct(RoleRepository $roleRepository)
    {

        $this->roleRepository = $roleRepository;
        view()->share('item', $this->resource);
        view()->share('class', Role::class);
    }


    public function index()
    {
        $roles = $this->roleRepository->getRoles();

        return view('admin.pages.roles.role_list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Permission::where('guard_name', 'web')->get();

        return view('admin.pages.roles.role_add', get_defined_vars())->with('directory', 'admin.pages.roles.role_add');
        //        return view('admin.pages.roles.role_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {

        $data = $request->validated();

        $role = Role::create(['name' => $data['name'], 'guard_name' => 'web']);
        if (isset($data['permissionArray'])) {
            foreach ($data['permissionArray'] as $permission => $value) {
                $role->givePermissionTo($permission);
            }
        }
        $request->session()->flash('success', 'Role added successfully');

        $roles = $this->roleRepository->getRoles();

        return view('admin.pages.roles.role_list', compact('roles'));

        //        $this->roleRepository->add($request);
        //        return redirect()->route('admin.roles.index');
    }


    public function show(Role $role)
    {

        $groups = Permission::where('guard_name', 'web')->get();
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view(self::DIRECTORY . '.role_show', compact('role', 'groups', 'rolePermissions'))
            ->with('directory', self::DIRECTORY);

    }

    public function edit(Role $role)
    {
        $groups = Permission::where('guard_name', 'web')->get();
        $rolePermissions = $role->permissions()->pluck('id')->toArray();

        return view(self::DIRECTORY . '.role_edit', compact('role', 'groups', 'rolePermissions'))
            ->with('directory', self::DIRECTORY);
    }

    public function update(RoleRequest $request, Role $role)
    {

        $data = $request;
        $role->update(['name' => $data['name'], 'guard_name' => 'web']);
        $role->syncPermissions();
        if (isset($data['permissionArray'])) {
            foreach ($data['permissionArray'] as $permission) {
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('admin.roles.index');

    }

    public function destroy(Request $request, Role $role): RedirectResponse
    {
        $role->syncPermissions();
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
