<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setIndicator extends Model
{
    use HasFactory;
      protected $fillable = [
        'qns',
        'duration',
        'status',
        'user_id'       
    ];
}
