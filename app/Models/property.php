<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
       protected $fillable = [
        'property_name',
        'property_category',
        'property_rank',
        'room_no',
        'location_name',
        'phone',
        'email',
        'property_description',
        'photo',
        'status',
        'user_id'
    ];
}
