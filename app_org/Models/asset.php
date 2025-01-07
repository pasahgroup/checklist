<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class asset extends Model
{
    use HasFactory;
     protected $fillable = [
         'property_id',
         'location_id',
        'metaname_id',
        'asset_name',
        'asset_type',

        'asset_brand',
        'asset_location',
        'asset_version',

        'asset_serial_no',
        'asset_barcode',
        'asset_tag_no',
        'asset_description',
        'photo',
        'status',
        'user_id'
    ];

       public static function getAsset($n){   
      // $value = DB::select('select id,subcategory from subcategories where category_id="'.$n.'" order by subcategory');
         $value = DB::select('select * from users');
      return $value;
    }
}
