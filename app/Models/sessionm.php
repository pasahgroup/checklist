<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessionm extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_name',
        'status',
        'user_id'
    ];
}
