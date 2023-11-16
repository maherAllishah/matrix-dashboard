<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Career extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;

    const Career_Hidden = 0;

    const Career_Visible = 1;

    protected $fillable = [
        'name', 'department_id', 'salary', 'experience', 'work_type', 'skills',
        'description', 'situation', 'your_tasks', 'Work_requirements', 'we_offer',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    //    protected $casts=['skills'=>'array'];
    //    protected function skills(): Attribute
    //                        {
    //                            return Attribute::make(
    //                                get:fn ($skills)=>json_encode($skills,true),
    //                                set:fn ($skills)=>json_encode($skills),
    //                            );
    //                        }
}
