<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'position',
        'password',

    ];

    protected $hidden = [
        'password',
    ];

    public function getStoredRole()
    {
        return $this->roles->first();
    }

    public function department(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    /**
     * The roles that belong to the permission.
     */
//    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id', 'role_id')
//            ->where('model_type', Admin::class);
//    }
}
