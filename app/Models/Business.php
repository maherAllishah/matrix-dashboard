<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Business extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image'];

    public function business(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
