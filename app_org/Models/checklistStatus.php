<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checklistStatus extends Model
{
    use HasFactory;

     protected $fillable = [
        'sys_user_id',
        'site_id',
        'grade_id',
        'grade',
        'status',
        'user_id',
    ];
}
