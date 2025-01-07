<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answerUpdatePhoto extends Model
{
    use HasFactory;
    protected $fillable = [
    	'index_id',
    	'index_count',
      'property_id',
      'asset_id',
      'metaname_id',
      'indicator_id',
    	'answer_id',
        'user_id',
          'description',
         'image',
        'status'
    ];
}
