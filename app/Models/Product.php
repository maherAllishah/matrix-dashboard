<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'link', 'business_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
