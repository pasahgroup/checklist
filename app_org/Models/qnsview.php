<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qnsview extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'metaname_id',
        'section',
        'duration',
        'id',
        'qns'
    ];
}
