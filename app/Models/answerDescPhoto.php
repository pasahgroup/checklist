<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answerDescPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
      'property_id',
      'asset_id',
      'metaname_id',
      'indicator_id',
      'answer_id',
      'user_id',
        'section',
      'description',
      'image',
        'datex',
      'action',
      'status'
    ];
}
