<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answerCheckBox extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'indicator_id',
        'metaname_id',
        'opt_answer_id',
        'answer',
        'asset_id',
        'status',
        'action',
        'user_id',
        'datex'
    ];
}
