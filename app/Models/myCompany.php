<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'tin',
        'vrn',
        'logo',
        'address',
        'region',
        'district',
        'phone_number',
        'code',
        'first_name',
        'last_name',
        'code',
        'email',
        'status',
        'user_id',
    ];
}
