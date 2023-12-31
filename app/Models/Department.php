<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'admin_id'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function career(): HasMany
    {
        return $this->hasMany(Career::class);
    }
}
