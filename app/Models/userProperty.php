<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userProperty extends Model
{
    use HasFactory;
    protected $fillable  = [
        'sys_user_id',
        'property_id',
        'status',
        'user_id',
    ];
}
