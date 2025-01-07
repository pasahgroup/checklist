<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'indicator_id',
        'metaname_id',
        'opt_answer_id',
        'answer',
        'answer_label',
        'manager_checklist',
        'cleared_date',
        'asset_id',
        'section',
        'photo',
        'description',
        'status',
        'action',
        'user_id',
        'datex'
    ];
}
