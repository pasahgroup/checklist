<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dynamicIndUpdate extends Model
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
      'opt_answer_id',
      'answer_value',
       'value',
       'user_id',
       'description',
       'image',
       'status',
       'datex'
    ];
}
