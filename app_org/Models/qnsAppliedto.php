<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qnsAppliedto extends Model
{
    use HasFactory;
       protected $fillable  = [
        'metaname_id',
        'indicator_id',
        'section',
        'department_id',
        'unit_name',
        'status',
        'user_id',
    ];
}
