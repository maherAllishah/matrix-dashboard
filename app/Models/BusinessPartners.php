<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessPartners extends Model
{
    use HasFactory;

    protected $guarded = [];

    //    protected $fillable=['full_name','email','phone','full_address','city','province_id','photo'];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
