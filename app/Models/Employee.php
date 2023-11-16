<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    const Employee_Rejected = 0;

    const Employee_Approved = 1;

    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'situation', 'career_id',
        'hr_evaluate', 'file_one_path', 'file_two_path', 'head_of_section_evaluate'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}
