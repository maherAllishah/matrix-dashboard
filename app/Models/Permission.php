<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model implements PermissionContract
{
    use HasRoles;

    protected $attributes = [
        'guard_name' => 'web',
    ];

    protected $guarded = ['id'];

    protected $table = 'permissions';

    protected $fillable = [
        'name',

    ];

    public static function findByName($name, $guardName = null): self
    {

        return Permission::where('name', $name)
            ->where('guard_name', $guardName)
            ->first();

    }

    public static function findOrCreate($name, $guardName = null): self
    {
        $permission = static::findByName($name, $guardName);

        if (!$permission) {
            $permission = static::create([
                'name' => $name,
                'guard_name' => $guardName,
            ]);
        }

        return $permission;
    }

    public static function findById($id, $guardName = null): self
    {
        return static::where('id', $id)
            ->where('guard_name', $guardName)
            ->first();
    }
}
