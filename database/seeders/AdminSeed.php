<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nameOfPermissions = [
            'control admins',

            'hr permission', 'manager permission',

            'list direct employee', 'delete direct employee',

            'control roles',

            'control business partner',

            'control settings',

            'delete contacts', 'list contacts',
        ];

        $admin = Admin::query()->firstOrCreate([
            'name' => 'admin',
            'position' => 'admin',
            'email' => 'matrix@admin.com',
            'password' => bcrypt('matrix@admin.com'),
        ]);

        foreach ($nameOfPermissions as $permissionName) {
            Permission::query()->firstOrCreate([
                'name' => $permissionName,
                'guard_name' => 'web',
            ]);
        }

        $adminRole = Role::findOrCreate('Admin');
        $permissions = Permission::query()->whereIn('name', $nameOfPermissions)->get();
        $adminRole->syncPermissions($permissions);


        $role = Role::findByName('Admin'); // get the role you want to link

        DB::table('model_has_roles')->insert([
            'role_id' => $role->id,
            'model_id' => $admin->id,
            'model_type' => Admin::class,
        ]);

        $admin->syncPermissions($permissions);
    }
}
