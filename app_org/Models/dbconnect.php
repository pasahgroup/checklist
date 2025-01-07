<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class dbconnect extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'company_id',
        'db_name',
        'db_username',
        'pwd',
        'host',
        'status'
   ];  
}
