<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'city', 'phone', 'email', 'hours', 'facebook', 'whatsapp', 'instagram', 'linkedin'];
}
