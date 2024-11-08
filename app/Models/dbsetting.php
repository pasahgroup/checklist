<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class dbsetting extends Model
{
   //  use HasFactory;

   //      protected $fillable = [
   //      'company_id',
   //      'db_name',
   //      'db_username',
   //      'pwd',
   //      'host',
   //      'status'
   // ];

    public static function getConnect($n){   
      //$value = DB::select('select * from my_companies');
      //     $value = DB::select('select *from my_companies where tin="'.$n.'" order by tin');
       //dd($n);
    
$db="checkmasterdb2";
  $setconfig= Config::set('database.connections.clientdb', [   
    'driver' => 'mysql',  
        'host' =>'127.0.0.1',  
        'database' =>$db,  
        'username' =>'root',  
        'password' =>'',  
        'charset' => 'utf8mb4',  
        'collation' => 'utf8mb4_unicode_ci',  
        'prefix' => '',  
        'strict' => true,  
        'engine' => null,  
   // all the other params from config
]);
   //return $setconfig; 
    }
}
