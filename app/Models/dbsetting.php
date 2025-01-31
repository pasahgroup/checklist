<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

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
              //$valueDB=DB::table('dbconnects')->where('user_id',$n)->first();
   $auth=auth::user();
//$db=$valueDB->db_name;
//dd($auth);

// DB::close('mysql');
      Config::set('database.connections.mysql.host',$auth->host);
        Config::set('database.connections.mysql.database',$auth->db_name);
        Config::set('database.connections.mysql.username',$auth->db_username);
       Config::set('database.connections.mysql.password',$auth->pwd);
     DB::reconnect('mysql');

      // DB::statement("use $db");


          // $value = DB::select('select * from dbconnects where user_id="'.$n.'"');
          // $valueDB=DB::table('dbconnects')->where('user_id', $n)->first();

          //$connectValue=dbconn::where()->first();
//dd($db);
//$db="checkmasterdb2x";
//   $setconfig= Config::set('database.connections.clientdb', [
//     'driver' => 'mysql',
//         // 'host' =>$valueDB->host,
//         // 'database' =>$valueDB->db_name,
//         // 'username' =>$valueDB->db_username,
//         // 'password' =>$valueDB->pwd,
//
//         'host' =>'localhost',
//         'database' =>'mbvldb',
//         'username' =>'root',
//         'password' =>'',
//
//         'charset' => 'utf8mb4',
//         'collation' => 'utf8mb4_unicode_ci',
//         'prefix' => '',
//         'strict' => true,
//         'engine' => null,
// ]);
    }

}
